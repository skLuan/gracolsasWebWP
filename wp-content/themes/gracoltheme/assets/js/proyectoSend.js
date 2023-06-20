const form = document.getElementById("gs_form_project_to_sm");

// Realizar la solicitud POST a la API
async function sendSmart(formData) {
  console.log(JSON.stringify(formData));
  let data = await fetch("https://api.smart-home.com.co/api/leadForm/", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(formData),
  });
  return await data.json();
}

async function send(e) {
  e.preventDefault();
  
  var WPHeaderInfo = WPheader.data;
  // Obtener los valores de los campos del formulario
  var firstName = form.project_customer.value;
  var lastName = '';
  var email = form.project_email.value;
  var mobileNumber = form.project_tel.value;
  var origin = window.location.href; // Puedes establecer este valor según tus necesidades
  // var comment = form.getElementById("comment").value;
  var projectId = WPHeaderInfo.SMProjectKey; // Puedes establecer este valor según tus necesidades
  var locationID = WPHeaderInfo.locationSourceId; // Puedes establecer este valor según tus necesidades
  
  // Crear el objeto con los datos
  var formData = {
    first_name: firstName,
    last_name: lastName,
    email: email,
    mobile_number: mobileNumber,
    origin: origin,
    projectId: projectId,
    // projectId:
    //   "ia28rR/NKN0EaJkrKl0CygwhC2TC4jAG1Zpnn6ECe0ObefG7dnJtFLpS7iZwyaMK",
    locationSourceId: locationID,
    scoring: "20",
  };


  $response = await sendSmart(formData);
  console.log($response);
  
  // Convertir el objeto a JSON
  // var jsonData = JSON.stringify(formData);
  
}
form.addEventListener('submit', send);