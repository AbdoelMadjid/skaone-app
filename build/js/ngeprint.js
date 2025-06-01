function setupPrintHandler(options) {
    const {
        printButtonId,
        tableContentId,
        requiredFields = [],
        title = 'Dokumen Cetak',
        customStyle = `
            body { font-family: Arial, sans-serif; font-size: 12px; }
            table { width: 100%; border-collapse: collapse; }
            table, th, td { border: 1px solid black; }
            th, td { padding: 5px; text-align: center; }
            h4 { margin: 5px 0; text-align: center; }
        `,
        beforeContent = '',
        afterContent = ''
    } = options;

    document.addEventListener('DOMContentLoaded', function() {
        const printButton = document.getElementById(printButtonId);

        if (!printButton) {
            console.error(`Tombol print dengan ID '${printButtonId}' tidak ditemukan`);
            return;
        }

        printButton.addEventListener('click', function() {
            for (const field of requiredFields) {
                const el = document.getElementById(field.id);
                if (!el || !el.value) {
                    if (typeof showToast === 'function') {
                        showToast('error', field.message);
                    } else {
                        alert(field.message);
                    }
                    return;
                }
            }

            const content = document.getElementById(tableContentId);
            if (!content) {
                console.error(`Konten tabel dengan ID '${tableContentId}' tidak ditemukan`);
                return;
            }

            const win = window.open('', '_blank');
            win.document.write(`
                <html>
                <head>
                    <title>${title}</title>
                    <style>${customStyle}</style>
                </head>
                <body>
                    ${typeof beforeContent === 'function' ? beforeContent() : beforeContent}
                    ${content.innerHTML}
                    ${typeof afterContent === 'function' ? afterContent() : afterContent}
                </body>
                </html>
            `);
            win.document.close();
            win.focus();
            win.print();
            win.close();
        });
    });
}
