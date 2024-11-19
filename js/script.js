// script.js

// Konfirmasi sebelum menghapus data
function confirmDelete(message) {
    return confirm(message || "Apakah Anda yakin ingin menghapus data ini?");
}

// Validasi form sederhana
function validateForm(formId) {
    const form = document.getElementById(formId);
    let isValid = true;

    // Periksa setiap input dengan atribut required
    form.querySelectorAll('[required]').forEach(input => {
        if (!input.value.trim()) {
            alert(`Field ${input.name || "form"} harus diisi.`);
            isValid = false;
            input.focus();
            return false;
        }
    });

    return isValid;
}

// Highlight input saat fokus
document.addEventListener('DOMContentLoaded', () => {
    const inputs = document.querySelectorAll('input, textarea, select');
    inputs.forEach(input => {
        input.addEventListener('focus', () => input.classList.add('highlight'));
        input.addEventListener('blur', () => input.classList.remove('highlight'));
    });
});
