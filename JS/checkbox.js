function toggleInputs(checkboxId, divId) {
    // Najdeme element s id podle parametru divId
    const extraInputs = document.getElementById(divId);
    // Najdeme checkbox s id podle parametru checkboxId
    const checkbox = document.getElementById(checkboxId);

    // Pokud je checkbox zaškrtnutý
    if (checkbox.checked) {
        // Odstraníme třídu "hidden", čímž zobrazíme další inputy
        extraInputs.classList.remove("hidden");
    } else {
        // Pokud není zaškrtnutý, přidáme třídu "hidden" a skryjeme inputy
        extraInputs.classList.add("hidden");
    }
}