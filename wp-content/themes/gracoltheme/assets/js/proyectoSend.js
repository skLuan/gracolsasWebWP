const form = document.getElementById("gs_form_project_to_sm");

function validateValue(value) {
  if (value == undefined || value == null || value == "") {
    return false;
  } else return true;
}

function validateForm(formData) {
  var isvalid = true;
  var areValues = [
    validateValue(formData.first_name),
    validateValue(formData.email),
    validateValue(formData.mobile_number),
    validateValue(formData.origin),
    validateValue(formData.projectId),
    validateValue(formData.locationSourceId),
  ];
  areValues.forEach((val, i) => {
    if (val == false) {
      isvalid = false;
      return;
    }
  });

  return isvalid;
}

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

function stylesWait() {
  let classes = ["btn-project-form-wait"];
  let btn = form.gs_send_project_SM;
  btn.classList.add(classes);
  btn.value = "Enviando...";
}
function stylesDefault() {
  let classes = ["btn-project-form-wait"];
  let btn = form.gs_send_project_SM;
  let resultContainer = form.querySelector("#gs_result_send_api");

  btn.classList.remove(classes);
  resultContainer.classList.replace("hidden", "flex");
  btn.value = "Enviar otro formulario";

  setTimeout(() => {
    resultContainer.classList.replace("flex", "hidden");
  }, 7000);
}
async function send(e) {
  e.preventDefault();
  stylesWait();
  var WPHeaderInfo = WPheader.data;
  // Obtener los valores de los campos del formulario
  var firstName = form.project_customer.value;
  var lastName = "";
  var email = form.project_email.value;
  var mobileNumber = form.project_tel.value;
  var origin = window.location.href; // Puedes establecer este valor según tus necesidades
  // var comment = form.getElementById("comment").value;
  var projectId = WPHeaderInfo.SMProjectKey ? WPHeaderInfo.SMProjectKey : ""; // Puedes establecer este valor según tus necesidades
  var locationID = WPHeaderInfo.locationSourceId; // Puedes establecer este valor según tus necesidades

  // Crear el objeto con los datos
  var formData = {
    first_name: firstName,
    last_name: lastName,
    email: email,
    mobile_number: mobileNumber,
    origin: origin,
    projectId: projectId,
    //projectId:
      //"ia28rR/NKN0EaJkrKl0CygwhC2TC4jAG1Zpnn6ECe0ObefG7dnJtFLpS7iZwyaMK",
    locationSourceId: locationID,
    scoring: "20",
  };
  if (!validateForm(formData)) return;

  $response = await sendSmart(formData);

  if ($response.result == "Cliente creado correctamente.") {
    stylesDefault();
    console.log("sto si paso");
  }
}

form.addEventListener("submit", send);
