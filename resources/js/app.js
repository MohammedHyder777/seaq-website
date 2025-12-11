import './bootstrap';

import Alpine from 'alpinejs';

import * as pdfjsLib from "pdfjs-dist/build/pdf";

// Tell PDF.js where the worker is
pdfjsLib.GlobalWorkerOptions.workerSrc = new URL(
    'pdfjs-dist/build/pdf.worker.mjs',
    import.meta.url
).toString();


window.Alpine = Alpine;
Alpine.start();
