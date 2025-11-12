/**
 * Tierliebe Element Library - Registry
 *
 * Enthält alle wiederverwendbaren Element-Templates für den Tierliebe Frontend-Editor
 *
 * @version 1.0.0
 * @date 2025-11-09
 */

const TIERLIEBE_ELEMENT_REGISTRY = {

    /**
     * Info-Boxen (Meistgenutzt - 50+ Instanzen)
     */
    'info-boxes': [
        {
            id: 'info-box-standard',
            name: 'Info-Box Standard',
            icon: '💡',
            description: 'Standard Info-Box ohne Spezial-Style',
            template: `<div class="info-box" data-emoji="💡">
    <h3 class="editable" data-key="{key}-titel">Titel hier eingeben</h3>
    <p class="editable" data-key="{key}-text">Text hier eingeben...</p>
</div>`
        },
        {
            id: 'info-box-info',
            name: 'Info-Box Info',
            icon: '✅',
            description: 'Blaue Info-Box für wichtige Informationen',
            template: `<div class="info-box info" data-emoji="✅">
    <h3 class="editable" data-key="{key}-titel">Wichtige Info</h3>
    <p class="editable" data-key="{key}-text">Text hier eingeben...</p>
</div>`
        },
        {
            id: 'info-box-warning',
            name: 'Info-Box Warnung',
            icon: '⚠️',
            description: 'Rote Warn-Box für kritische Hinweise',
            template: `<div class="info-box warning" data-emoji="⚠️">
    <h3 class="editable" data-key="{key}-titel">Warnung</h3>
    <p class="editable" data-key="{key}-text">Text hier eingeben...</p>
</div>`
        },
        {
            id: 'info-box-love',
            name: 'Info-Box Liebe',
            icon: '💭',
            description: 'Pinke Box für emotionale Botschaften',
            template: `<div class="info-box love" data-emoji="💭">
    <h3 class="editable" data-key="{key}-titel">Mit Liebe</h3>
    <p class="editable" data-key="{key}-text">Text hier eingeben...</p>
</div>`
        },
        {
            id: 'info-box-mint',
            name: 'Info-Box Mint',
            icon: '🌱',
            description: 'Mintfarbene Box',
            template: `<div class="info-box" data-emoji="🌱" style="background: var(--pastel-mint);">
    <h3 class="editable" data-key="{key}-titel">Titel</h3>
    <p class="editable" data-key="{key}-text">Text hier eingeben...</p>
</div>`
        },
        {
            id: 'info-box-coral',
            name: 'Info-Box Coral',
            icon: '💔',
            description: 'Coral-farbene Box',
            template: `<div class="info-box" data-emoji="💔" style="background: var(--pastel-coral); color: white;">
    <h3 class="editable" data-key="{key}-titel">Titel</h3>
    <p class="editable" data-key="{key}-text">Text hier eingeben...</p>
</div>`
        },
        {
            id: 'info-box-lavender',
            name: 'Info-Box Lavender',
            icon: '🎯',
            description: 'Lavender-farbene Box',
            template: `<div class="info-box" data-emoji="🎯" style="background: var(--pastel-lavender);">
    <h3 class="editable" data-key="{key}-titel">Titel</h3>
    <p class="editable" data-key="{key}-text">Text hier eingeben...</p>
</div>`
        },
        {
            id: 'info-box-peach',
            name: 'Info-Box Peach',
            icon: '💕',
            description: 'Peach-farbene Box',
            template: `<div class="info-box" data-emoji="💕" style="background: var(--pastel-peach); text-align: center;">
    <p class="editable" data-key="{key}-text" style="font-size: 1.2rem; line-height: 1.8;">Text hier eingeben...</p>
</div>`
        },
        {
            id: 'info-box-liste',
            name: 'Info-Box mit Liste',
            icon: '📝',
            description: 'Info-Box mit Aufzählungsliste',
            template: `<div class="info-box" data-emoji="📝">
    <h3 class="editable" data-key="{key}-titel">Titel</h3>
    <ul class="editable" data-key="{key}-liste">Listenpunkt 1
Listenpunkt 2
Listenpunkt 3</ul>
</div>`
        }
    ],

    /**
     * Cards (Kontakt-Seite, 3 Instanzen)
     */
    'cards': [
        {
            id: 'card-mint',
            name: 'Karte Mint',
            icon: '🏡',
            description: 'Mintfarbene Karte mit Icon',
            template: `<div class="card mint">
    <span class="card-icon">🏡</span>
    <h3 class="editable" data-key="{key}-titel">Titel</h3>
    <p class="editable" data-key="{key}-text">Text hier eingeben...</p>
</div>`
        },
        {
            id: 'card-peach',
            name: 'Karte Peach',
            icon: '💬',
            description: 'Peach-farbene Karte mit Icon',
            template: `<div class="card peach">
    <span class="card-icon">💬</span>
    <h3 class="editable" data-key="{key}-titel">Titel</h3>
    <p class="editable" data-key="{key}-text">Text hier eingeben...</p>
</div>`
        },
        {
            id: 'card-lavender',
            name: 'Karte Lavender',
            icon: '🤝',
            description: 'Lavender-farbene Karte mit Icon',
            template: `<div class="card lavender">
    <span class="card-icon">🤝</span>
    <h3 class="editable" data-key="{key}-titel">Titel</h3>
    <p class="editable" data-key="{key}-text">Text hier eingeben...</p>
</div>`
        }
    ],

    /**
     * Accordions (40+ Instanzen auf 5 Seiten)
     */
    'accordions': [
        {
            id: 'accordion-item-simple',
            name: 'Accordion Item Einfach',
            icon: '📋',
            description: 'Einfaches ausklappbares Element',
            template: `<div class="accordion-item">
    <button class="accordion-header">
        <span class="editable" data-key="{key}-header">Header Text</span>
        <span class="accordion-icon">+</span>
    </button>
    <div class="accordion-content">
        <h4 class="editable" data-key="{key}-h4">Untertitel</h4>
        <p class="editable" data-key="{key}-text1">Text hier eingeben...</p>
    </div>
</div>`
        },
        {
            id: 'accordion-item-with-infobox',
            name: 'Accordion Item mit Info-Box',
            icon: '📋',
            description: 'Accordion mit eingebetteter Info-Box',
            template: `<div class="accordion-item">
    <button class="accordion-header">
        <span class="editable" data-key="{key}-header">Header Text</span>
        <span class="accordion-icon">+</span>
    </button>
    <div class="accordion-content">
        <h4 class="editable" data-key="{key}-h4">Untertitel</h4>
        <p class="editable" data-key="{key}-text1">Einleitungstext...</p>
        <div class="info-box" data-emoji="💡" style="margin-top: 20px; background: var(--pastel-mint);">
            <p class="editable" data-key="{key}-infobox-titel">Info-Box Titel</p>
            <ul class="editable" data-key="{key}-liste">Punkt 1
Punkt 2
Punkt 3</ul>
        </div>
        <p class="editable" data-key="{key}-text2" style="margin-top: 20px;">Abschlusstext...</p>
    </div>
</div>`
        }
    ],

    /**
     * Qualzucht-Cards (8 Instanzen)
     */
    'qualzucht': [
        {
            id: 'qualzucht-card',
            name: 'Qualzucht-Karte',
            icon: '🐕',
            description: 'Rassen-Karte mit Bild und Leiden-Liste',
            template: `<div class="qualzucht-card">
    <div class="qualzucht-image editable-image" data-image-meta="{key}-bild">
        <img src="/wp-content/themes/webworks-theme/images/placeholder-dog.jpg" alt="Rasse">
    </div>
    <div class="qualzucht-content">
        <div class="qualzucht-icon editable" data-key="{key}-icon">🐕</div>
        <h3 class="editable" data-key="{key}-titel">Rasse Name</h3>
        <p class="qualzucht-herkunft editable" data-key="{key}-herkunft">Herkunft: ...</p>
        <div class="qualzucht-leiden">
            <h4 class="editable" data-key="{key}-leiden-titel">Typische Leiden:</h4>
            <ul class="editable" data-key="{key}-leiden-liste">Leiden 1
Leiden 2
Leiden 3</ul>
        </div>
        <div class="qualzucht-wissen editable" data-key="{key}-wissen">Wusstest du? ...</div>
    </div>
</div>`
        }
    ],

    /**
     * Timeline Items (6 Instanzen auf Adoption-Page)
     */
    'timeline': [
        {
            id: 'timeline-item',
            name: 'Timeline Schritt',
            icon: '⏳',
            description: 'Nummerierter Prozess-Schritt',
            template: `<div class="timeline-item">
    <div class="timeline-marker">1</div>
    <div class="timeline-content">
        <h3 class="editable" data-key="{key}-titel">Schritt-Titel</h3>
        <p class="editable" data-key="{key}-text">Beschreibung des Schritts...</p>
    </div>
</div>`
        }
    ],

    /**
     * Mythos-Cards (13 Instanzen auf Irrtümer-Page)
     */
    'mythos': [
        {
            id: 'mythos-card',
            name: 'Mythos-Karte',
            icon: '❓',
            description: 'Irrtum-Karte mit Wahrheit',
            template: `<div class="mythos-card" data-category="all">
    <div class="mythos-header">
        <span class="mythos-icon">❓</span>
        <h3 class="mythos-irrtum editable" data-key="{key}-titel">Irrtum: ...</h3>
    </div>
    <div class="mythos-content">
        <p class="mythos-wahrheit editable" data-key="{key}-text">Wahrheit: ...</p>
    </div>
</div>`
        }
    ],

    /**
     * Quick-Link-Cards (6 Instanzen auf Home-Page)
     */
    'quick-links': [
        {
            id: 'quick-link-card',
            name: 'Quick-Link Karte',
            icon: '🔗',
            description: 'Navigations-Karte mit Link',
            template: `<a href="#" class="quick-link-card" data-editable-url="{key}-url">
    <span class="quick-link-icon">🔗</span>
    <h4 class="editable" data-key="{key}-titel">Link Titel</h4>
    <p class="editable" data-key="{key}-text">Beschreibung...</p>
</a>`
        }
    ],

    /**
     * Special Elements (Honesty-Box, Section-Headers)
     */
    'special': [
        {
            id: 'honesty-box',
            name: 'Honesty Box',
            icon: '💔',
            description: 'Große emotionale Box mit Button',
            template: `<div class="honesty-box" data-emoji="💔">
    <h3 class="editable" data-key="{key}-title">Titel</h3>
    <p style="font-size: 1.2rem;" class="editable" data-key="{key}-text1">Text 1</p>
    <p style="margin-top: 25px;" class="editable" data-key="{key}-warum">Warum?</p>
    <p style="margin-top: 25px; font-weight: 700;" class="editable" data-key="{key}-kernaussage">Kernaussage</p>
    <div style="text-align: center; margin-top: 30px;">
        <a href="#" class="btn btn-primary" data-editable-url="{key}-url">
            <span class="editable" data-key="{key}-button">Button Text</span>
        </a>
    </div>
</div>`
        },
        {
            id: 'section-header',
            name: 'Section Header',
            icon: '📌',
            description: 'Sektion-Überschrift mit Untertitel',
            template: `<div class="section-header">
    <h2 class="section-title editable" data-key="{key}-titel">Sektion Titel</h2>
    <p class="section-subtitle editable" data-key="{key}-subtitle">Untertitel...</p>
</div>`
        }
    ]
};

// Export für globale Verwendung
window.TIERLIEBE_ELEMENT_REGISTRY = TIERLIEBE_ELEMENT_REGISTRY;

console.log('Tierliebe Element Registry geladen:', Object.keys(TIERLIEBE_ELEMENT_REGISTRY).length, 'Kategorien');