
document.addEventListener('DOMContentLoaded', () => {
    const welcomeMessage = document.createElement('h1');;
    welcomeMessage.style.color = 'yellow';
    document.body.appendChild(welcomeMessage);

    // Select all cards in the main sections
    const cardSelectors = [
        '.feature-card',
        '.service-card',
        '.portfolio-card',
        '.pricing-card',
        '.blog-card'
    ];

    cardSelectors.forEach(selector => {
        document.querySelectorAll(selector).forEach(card => {
            card.addEventListener('pointerover', (e) => {
                if (e.pointerType === 'mouse' && e.buttons === 0) {
                    card.style.transform = 'scale(1.04)';
                    card.style.transition = 'transform 0.2s cubic-bezier(.4,2,.3,1)';
                    card.style.boxShadow = '0 8px 32px #FFD60044';
                    card.style.border = '2px solid #FFD600'; // garis kuning
                }
            });
            card.addEventListener('pointerout', () => {
                card.style.transform = '';
                card.style.boxShadow = '';
                card.style.border = ''; // reset border
            });
        });
    });
});