from telegram import Update, ReplyKeyboardMarkup, ReplyKeyboardRemove
from telegram.ext import Updater, CommandHandler, MessageHandler, Filters, CallbackContext

# Обработчик команды /start
def start(update: Update, context: CallbackContext) -> None:
    # Создаем кнопку для запроса номера телефона
    keyboard = ReplyKeyboardMarkup([['Отправить номер телефона']], resize_keyboard=True)
    # Отправляем кнопку
    update.message.reply_text('Пожалуйста, отправьте свой номер телефона.', reply_markup=keyboard)
        # Создаем кнопку для отправки номера телефона
    #keyboard = ReplyKeyboardMarkup([[KeyboardButton(text="Отправить мой номер телефона", request_contact=True)]], resize_keyboard=True)

# Обработка номера телефона
def get_phone(update: Update, context: CallbackContext) -> None:
    phone_number = update.message.contact.phone_number
    
    # Сохраняем номер телефона в файл
    with open('phone_numbers.txt', 'a') as f:
        f.write(f'{phone_number}\n')
    
    # Отправляем запрос на имя
    update.message.reply_text('Введите ваше имя:')
    
    # Сохраняем номер телефона в контексте, чтобы получить его позже
    context.user_data['phone'] = phone_number

# Обработка имени
def get_name(update: Update, context: CallbackContext) -> None:
    name = update.message.text
    
    # Сохраняем имя в контексте, чтобы получить его позже
    context.user_data['name'] = name
    
    # Отправляем запрос на почту
    update.message.reply_text('Введите вашу почту:')
    
# Обработка почты
def get_email(update: Update, context: CallbackContext) -> None:
    email = update.message.text
    
    # Получаем данные из контекста
    name = context.user_data.get('name')
    phone_number = context.user_data.get('phone')
    
    # Сохраняем данные в файл
    timestamp = datetime.datetime.now().strftime('%d-%m-%Y_%H-%M')
    filename = f'{timestamp}_{name}.txt'
    with open(filename, 'w') as f:
        f.write(f'Имя: {name}\n')
        f.write(f'Номер телефона: {phone_number}\n')
        f.write(f'Почта: {email}\n')
    
    # Очищаем контекст
    context.user_data.clear()
    
    # Отправляем сообщение об успешном сохранении
    update.message.reply_text('Ваши данные успешно сохранены.')
    
# Очистка клавиатуры
def clear_keyboard(update: Update, context: CallbackContext) -> None:
    update.message.reply_text('Клавиатура скрыта.', reply_markup=ReplyKeyboardRemove())
    
# Создание и запуск бота
def main() -> None:
    updater = Updater('6213067886:AAGIFBgKyAS_iP2T8iG_TUctMlCdttgkot8')
    dispatcher = updater.dispatcher
    
    # Добавляем обработчики команд
    dispatcher.add_handler(CommandHandler('start', start))
    dispatcher.add_handler(MessageHandler(Filters.contact, get_phone))
    dispatcher.add_handler(MessageHandler(Filters.text, get_name))
    dispatcher.add_handler(MessageHandler(Filters.regex(r'\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b'), get_email))
    dispatcher.add_handler(CommandHandler('clear', clear_keyboard))
    
    # Запускаем бота
    updater.start_polling()
    updater.idle()

if __name__ == '__main__':
    main()