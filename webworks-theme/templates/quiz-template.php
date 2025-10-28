<?php
/**
 * Tierliebe Quiz Template
 * Shortcode Template für den Bereitschaftstest
 */
?>

<div class="quiz-container">
    <!-- Quiz Intro -->
    <div class="quiz-intro uk-alert-primary">
        <h3>🌈 Bereit für die Wahrheit?</h3>
        <p>Dieser Test zeigt dir ehrlich, ob du bereit bist. Keine Beschönigung, keine Ausreden. Es geht nicht um Perfektion – sondern um Realität und echte Verantwortung. 💕</p>
    </div>

    <!-- Progress Bar -->
    <div class="progress-container">
        <p class="progress-label">Frage <span id="current-question">0</span> von 8</p>
        <div class="progress-bar">
            <div class="progress-fill" id="progress-fill" style="width: 0%">
                <span class="progress-paw">🐾</span>
            </div>
        </div>
    </div>

    <!-- Quiz Form -->
    <form id="test-form">
        <div id="questions-container"></div>

        <!-- Navigation Buttons -->
        <div class="quiz-nav uk-flex uk-flex-between">
            <button type="button" id="prevBtn" class="uk-button uk-button-default uk-hidden">← Zurück</button>
            <button type="button" id="nextBtn" class="uk-button uk-button-primary">Weiter →</button>
            <button type="submit" id="submitBtn" class="uk-button uk-button-primary uk-hidden">Ergebnis anzeigen 🎉</button>
        </div>
    </form>
</div>

<!-- Result Container -->
<div id="result-content" class="uk-margin-large-top"></div>
