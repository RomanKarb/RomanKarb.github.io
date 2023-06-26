var camera, scene, renderer, controls, mesh, texture, skinTexture;

function init() {
    scene = new THREE.Scene();
    camera = new THREE.PerspectiveCamera(60, window.innerWidth / window.innerHeight, 0.1, 1000);
    camera.position.set(0, 0, -20);
    renderer = new THREE.WebGLRenderer({canvas: document.getElementById("cnv")});
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.setClearColor(0xffffff, 1);
    controls = new THREE.OrbitControls(camera, renderer.domElement);
    animate();
}

function animate() {
    requestAnimationFrame(animate);
    renderer.render(scene, camera);
    controls.update();
}

function loadSkin() {
    // Получаем никнейм Minecraft из текстового поля
    var nickname = $("#nickname").val();
    // Получаем UUID скина
    $.ajax({
        url: "https://api.mojang.com/users/profiles/minecraft/" + nickname,
        method: "GET",
        success: function (data) {
            var uuid = data.id;
            // Загружаем скин
            texture = new THREE.TextureLoader().load("http://textures.minecraft.net/texture/" + uuid);
            // Создаем геометрию и материал модели персонажа
            var geometry = new THREE.BoxGeometry(1, 2, 1);
            var material = new THREE.MeshBasicMaterial({map: texture});
            // Создаем модель персонажа
            mesh = new THREE.Mesh(geometry, material);
            scene.add(mesh);
        },
        error: function () {
            alert("Невозможно загрузить скин");
        }
    });
}

function saveSkin() {
    // Создаем рендер головы
    skinTexture = new THREE.Texture(renderer.domElement);
    skinTexture.needsUpdate = true;
    var headRender = new THREE.Mesh(new THREE.PlaneGeometry(1, 1), new THREE.MeshBasicMaterial({map: skinTexture, side: THREE.DoubleSide, transparent: true}));
    // Сохраняем рендер головы на локальный сервер
    var headBlob = new Blob([renderer.domElement.toDataURL("image/png").replace(/^data:image\/(png|jpg);base64,/, "")], {type: "image/png"});
    var headFile = new File([headBlob], "head-render.png", {type: "image/png"});
    $.ajax({
        url: "save_head.php",
        method: "POST",
        processData: false,
        contentType: false,
        data: new FormData().append("head", headFile),
        success: function () {
            alert("Рендер головы сохранен");
        },
        error: function () {
            alert("Невозможно сохранить рендер головы");
        }
    });
    // Сохраняем скин на локальный сервер
    texture.needsUpdate = true;
    var skinBlob = new Blob([renderer.domElement.toDataURL("image/png").replace(/^data:image\/(png|jpg);base64,/, "")], {type: "image/png"});
    var skinFile = new File([skinBlob], "skin.png", {type: "image/png"});
    $.ajax({
        url: "save_skin.php",
        method: "POST",
        processData: false,
        contentType: false,
        data: new FormData().append("skin", skinFile),
        success: function () {
            alert("Скин сохранен");
        },
		error: function () {
            alert("Невозможно сохранить скинн");
}}}