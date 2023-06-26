// Создать сцену
var scene = new THREE.Scene();
// Создать камеру и установить её позицию
var camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
camera.position.z = 5;
// Создать рендерер
var renderer = new THREE.WebGLRenderer();
renderer.setSize(window.innerWidth, window.innerHeight);
document.body.appendChild(renderer.domElement);
// Загрузить текстуру скина игрока
var loader = new THREE.TextureLoader();
loader.load(skinUrl, function(texture) {
  // Создать материал для модели
  var material = new THREE.MeshBasicMaterial({ map: texture, skinning: true });
  // Загрузить модель из .json или .obj файла
  loader.load(modelUrl, function(geometry) {
    // Создать меш из геометрии и материала
    var mesh = new THREE.Mesh(geometry, material);
    // Добавить меш на сцену
    scene.add(mesh);
    // Анимировать сцену
    function animate() {
      requestAnimationFrame(animate);
      mesh.rotation.y += 0.01;
      renderer.render(scene, camera);
    }
    animate();
  });
});