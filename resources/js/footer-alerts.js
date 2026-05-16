// Footer SweetAlert logic
document.addEventListener('DOMContentLoaded', function() {
    var syaratBtn = document.getElementById('syarat-ketentuan');
    var kebijakanBtn = document.getElementById('kebijakan-privasi');

    if (syaratBtn) {
        syaratBtn.onclick = function() {
            Swal.fire({
                title: 'Syarat & Ketentuan',
                html: `
                    <div style="text-align: left; font-size: 14px; line-height: 1.8;">
                        <p>Website ini adalah karya original dari <b>Ceo Adyatma86</b>.</p>
                        <p style="margin-top: 8px;">Apabila ada pihak yang meniru website ini, akan dikenakan sanksi berupa:</p>
                        <ul style="list-style: disc; padding-left: 20px; margin-top: 8px;">
                            <li>🚬 <b>Rokok Surya 1 pak</b></li>
                        </ul>
                        <p style="margin-top: 12px; color: #ef4444; font-weight: 600;">
                            ⚠️ Sanksi berlaku tanpa terkecuali!
                        </p>
                    </div>
                `,
                icon: 'warning',
                iconColor: '#ef4444',
                confirmButtonText: 'OK',
                confirmButtonColor: '#4f46e5',
                background: document.documentElement.classList.contains('dark') ? '#1e293b' : '#fff',
                color: document.documentElement.classList.contains('dark') ? '#fff' : '#1e293b',
            });
        };
    }

    if (kebijakanBtn) {
        kebijakanBtn.onclick = function() {
            Swal.fire({
                title: 'Kebijakan Privasi',
                html: `
                    <div style="text-align: left; font-size: 14px; line-height: 1.8;">
                        <p>Jangan meniru website ini. Apabila melanggar, Anda akan dikenakan sanksi sesuai yang tertera di <b>Syarat & Ketentuan</b>.</p>
                        <p style="margin-top: 12px; color: #ef4444; font-weight: 600;">
                            ⚠️ Anda telah diperingatkan!
                        </p>
                    </div>
                `,
                icon: 'warning',
                iconColor: '#ef4444',
                confirmButtonText: 'OK',
                confirmButtonColor: '#4f46e5',
                background: document.documentElement.classList.contains('dark') ? '#1e293b' : '#fff',
                color: document.documentElement.classList.contains('dark') ? '#fff' : '#1e293b',
            });
        };
    }

    // Success Alert Auto-hide logic
    const successAlert = document.getElementById('success-alert');
    if (successAlert) {
        setTimeout(() => {
            successAlert.classList.add('opacity-0');
            setTimeout(() => successAlert.remove(), 500);
        }, 3000);
    }
});
