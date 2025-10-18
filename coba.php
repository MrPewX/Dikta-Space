<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kirim Email dengan EmailJS</title>
</head>
<body>
  <h2>Kirim Email dengan EmailJS</h2>
  
  <form id="contact-form">
    <label>Nama:</label><br>
    <input type="text" id="name" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="email" id="email" name="email" required><br><br>

    <label>Pesan:</label><br>
    <textarea id="message" name="message" required></textarea><br><br>

    <button type="submit">Kirim</button>
  </form>

  <p id="status"></p>

  <!-- Import library EmailJS -->
  <script src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
  <script>
    // Inisialisasi EmailJS dengan Public Key
    emailjs.init("zffr4u_BiX9nFCXSw"); // Ganti dengan public key kamu

    document.getElementById("contact-form").addEventListener("submit", function(event) {
      event.preventDefault();

      const serviceID = "service_960ztsn"; // Ganti dengan service ID kamu
      const templateID = "template_ldwq0k8"; // Ganti dengan template ID kamu

      const templateParams = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        message: document.getElementById("message").value
      };

      emailjs.send(serviceID, templateID, templateParams)
        .then(() => {
          document.getElementById("status").innerText = "✅ Pesan berhasil dikirim!";
          document.getElementById("contact-form").reset();
        }, (error) => {
          document.getElementById("status").innerText = "❌ Gagal mengirim: " + error.text;
        });
    });
  </script>
</body>
</html>
