import vk_api
import random
from vk_api.longpoll import VkLongPoll, VkEventType
from vk_api.keyboard import VkKeyboard, VkKeyboardColor

vk_session = vk_api.VkApi(token='vk1.a.bR7xM450df-Qv8g_Jh5OOTPUsIT6pFRXoBF9096jLA4zfOOVHuNH9G6Vzicy69fzLRaIeNFJgJOQdvEj6QyYPivZlClQQ9AG68dcNWMw3NVgBFkBsmi2t7PPNoaLnvGa_aJjnZA63juJwVOsay062yf467wwhg8G3iLn3FGLUPa83rDDksNRhprY6yKrPPAGuI7Ws1vDgZNGGm47JfA5uw')
longpoll = VkLongPoll(vk_session)

keyboard = None # для хранения текущей клавиатуры

buttons_start = {
    "начать": [VkKeyboardColor.PRIMARY, "Начать"],
}

buttons_main = {
    "написать в поддержку": [VkKeyboardColor.POSITIVE, "Написать в поддержку"],
    "зарегистрироваться": [VkKeyboardColor.POSITIVE, "Зарегистрироваться"],
    "общение": [VkKeyboardColor.PRIMARY, "Общение"],
}

def create_keyboard(buttons):
    keyboard = VkKeyboard(one_time=False)
    for button_name, button_data in buttons.items():
        color, label = button_data
        keyboard.add_button(label, color=color)
    return keyboard.get_keyboard()

def send_message(user_id, message):
    vk_session.method('messages.send', {'user_id': user_id, 'message': message,
                                        'keyboard': keyboard, 'random_id': random.randint(1, 10**9)})
    
def handle_message(user_id, message):
    global keyboard
    if keyboard is None or keyboard == create_keyboard(buttons_start):
        # Если клавиатура пустая или содержит только кнопку "Начать", то отправляем стартовую клавиатуру
        keyboard = create_keyboard(buttons_main)
        send_message(user_id, 'Чтобы вы хотели сделать?')
    elif message.lower().startswith("написать в поддержку"):
        support(user_id)
    elif message.lower().startswith("зарегистрироваться"):
        send_message(user_id, "Откроется страница для регистрации https://base.roservers.com/authorization/register.php")
    elif message.lower().startswith("общение"):
        start_dialog(user_id)
    elif keyboard is not None and "я буду называть вас" in keyboard.get_inline_keyboard():
        # если пользователь уже ввел свое имя
        if message.lower().startswith("да"):
            send_message(user_id, "Как у вас дела?")
            keyboard = create_keyboard({"Хорошо": [VkKeyboardColor.POSITIVE, "Хорошо"],
                                         "Плохо": [VkKeyboardColor.NEGATIVE, "Плохо"]})
        elif message.lower().startswith("изменить"):
            start_dialog(user_id)
        else:
            send_message(user_id, "Неизвестная команда")
    elif keyboard is not None and "как у тебя" in keyboard.get_inline_keyboard():
        send_message(user_id, "Рад, что у вас все хорошо!")
    else:
        send_message(user_id, "Неизвестная команда")

def save_name(user_id, name):
    # сохраняем имя в базу данных
    send_message(user_id, f"Я буду называть вас {name}.")
    keyboard = VkKeyboard(one_time=False)
    keyboard.add_button("Да", color=VkKeyboardColor.POSITIVE)
    keyboard.add_button("Изменить", color=VkKeyboardColor.NEGATIVE)
    send_message(user_id, "Вам нравится, как я вас называю?", keyboard)

def support(user_id):
    # отправляем уведомление администраторам
    send_message(user_id, "Обращение отправлено в службу поддержки.")

def handle_message(user_id, message):
    global keyboard
    if keyboard is None or keyboard == create_keyboard(buttons_start):
        # Если клавиатура пустая или содержит только кнопку "Начать", то отправляем стартовую клавиатуру
        keyboard = create_keyboard(buttons_main)
        send_message(user_id, 'Чтобы вы хотели сделать?')
    elif message.lower().startswith("написать в поддержку"):
        support(user_id)
    elif message.lower().startswith("зарегистрироваться"):
        send_message(user_id, "Откроется страница для регистрации https://base.roservers.com/authorization/register.php")
    elif message.lower().startswith("общение"):
        start_dialog(user_id)
    elif keyboard is not None and "я буду называть вас" in keyboard.get_inline_keyboard():
        # если пользователь уже ввел свое имя
        if message.lower().startswith("да"):
            send_message(user_id, "Как у вас дела?")
            keyboard = create_keyboard({"Хорошо": [VkKeyboardColor.POSITIVE, "Хорошо"],
                                         "Плохо": [VkKeyboardColor.NEGATIVE, "Плохо"]})
        elif message.lower().startswith("изменить"):
            start_dialog(user_id)
        else:
            send_message(user_id, "Неизвестная команда")
    elif keyboard is not None and "как у тебя" in keyboard.get_inline_keyboard():
        send_message(user_id, "Рад, что у вас все хорошо!")
    else:
        send_message(user_id, "Неизвестная команда")
    

for event in longpoll.listen():
    if event.type == VkEventType.MESSAGE_NEW and event.to_me:
        handle_message(event.user_id, event.text)