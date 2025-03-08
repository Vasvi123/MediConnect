function checkSymptoms() {
    const symptoms = document.getElementById("symptoms").value.toLowerCase();
    let result = "No diagnosis found.";

    if (symptoms.includes("fever") && symptoms.includes("cough")) {
        result = "Possible Flu. Please consult a doctor.";
    } else if (symptoms.includes("headache") && symptoms.includes("fatigue")) {
        result = "Possible Migraine. Stay hydrated.";
    }

    document.getElementById("result").innerText = result;
}
