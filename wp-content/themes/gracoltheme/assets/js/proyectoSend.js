function send() {
  console.log("desde el send");
  // var WPHeaderInfo = WPheader;
  console.log(WPheader);
  // Obtener los valores de los campos del formulario
  var firstName = document.getElementById("first_name").value;
  var lastName = document.getElementById("last_name").value;
  var email = document.getElementById("email").value;
  var mobileNumber = document.getElementById("mobile_number").value;
  var origin = "gracolsas.com"; // Puedes establecer este valor según tus necesidades
  var comment = document.getElementById("comment").value;
  var projectId =
    "ia28rR/NKN0EaJkrKl0CygwhC2TC4jAG1Zpnn6ECe0ObefG7dnJtFLpS7iZwyaMK"; // Puedes establecer este valor según tus necesidades

  // Crear el objeto con los datos
  var formData = {
    first_name: firstName,
    last_name: lastName,
    email: email,
    mobile_number: mobileNumber,
    origin: origin,
    comment: comment,
    projectId: projectId,
  };

  // Convertir el objeto a JSON
  var jsonData = JSON.stringify(formData);

}
send();
// Realizar la solicitud POST a la API
async function sendSmart() {
  let data = await fetch("https://api.smart-home.com.co/api/leadForm/", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: jsonData,
  })
  let jsonData = await data.json();

  console.log(jsonData);
}

// send();
