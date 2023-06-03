import "./bootstrap";
import flatpickr from "flatpickr";
import "flatpickr/dist/themes/material_blue.css";

document.addEventListener("DOMContentLoaded", function () {
    flatpickr("#datepicker", {
        enableTime: true,
        dateFormat: "Y-m-d H:i",
    });
});
