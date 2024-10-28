document.addEventListener("DOMContentLoaded", function () {
    const avatars = [
        "Avatar 3.png", 
        "Avatar 2.png", 
        "Avatar 1.png", 

    ];

    // Seleccionar avatar aleatorio
    const randomAvatar = avatars[Math.floor(Math.random() * avatars.length)];

    // Asignar avatar al campo oculto y mostrarlo
    document.getElementById("avatar").value = randomAvatar;
    document.getElementById("avatarPreview").innerHTML = `<img src="avatars/${randomAvatar}" alt="Avatar" width="100">`;
});
