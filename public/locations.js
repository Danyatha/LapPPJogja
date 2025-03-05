// locationLoader.js
import { locations } from "./lokasiData.js";

document.addEventListener('DOMContentLoaded', fetchLocationData);

function fetchLocationData() {
    const selectElement = document.getElementById('lokasi');

    if (!selectElement) {
        console.error('Element with ID "lokasi" not found');
        return;
    }

    selectElement.innerHTML = ''; // Clear existing options

    const defaultOption = document.createElement('option');
    defaultOption.value = '';
    defaultOption.textContent = '-- Pilih Lokasi --';
    selectElement.appendChild(defaultOption);

    locations.forEach(location => {
        const option = document.createElement('option');
        option.value = location.nama; // Simpan ID sebagai value
        option.textContent = location.nama; // Tampilkan hanya nama lokasi
        selectElement.appendChild(option);
    });
}

