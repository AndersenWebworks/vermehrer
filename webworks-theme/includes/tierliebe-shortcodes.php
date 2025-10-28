<?php
/**
 * Tierliebe Quiz Shortcode
 *
 * Usage: [tierliebe_quiz]
 */

function tierliebe_quiz_shortcode_new() {
    ob_start();
    ?>

    <div class="quiz-container">
        <div class="quiz-intro">
            <h3>🌈 Bereit für die Wahrheit?</h3>
            <p>Dieser Test zeigt dir ehrlich, ob du bereit bist. Keine Beschönigung, keine Ausreden. Es geht nicht um Perfektion - sondern um Realität und echte Verantwortung. 💕</p>
        </div>

        <div class="progress-container">
            <p class="progress-label">Frage <span id="current-question">1</span> von 8</p>
            <div class="progress-bar">
                <div class="progress-fill" id="progress-fill" style="width: 12.5%">
                    <span class="progress-paw">🐾</span>
                </div>
            </div>
        </div>

        <form id="test-form">
            <div id="questions-container"></div>

            <div class="quiz-nav">
                <button type="button" id="prevBtn" class="btn btn-secondary hidden">
                    ← Zurück
                </button>
                <button type="button" id="nextBtn" class="btn btn-primary">
                    Weiter →
                </button>
                <button type="submit" id="submitBtn" class="btn btn-primary hidden">
                    Ergebnis anzeigen 🎉
                </button>
            </div>
        </form>
    </div>

    <!-- Result Section -->
    <div id="result" class="hidden">
        <div id="result-content"></div>
        <div style="text-align: center; margin-top: 50px;">
            <button class="btn btn-secondary" onclick="resetTest()">
                🔄 Test wiederholen
            </button>
        </div>
    </div>

    <?php
    return ob_get_clean();
}
add_shortcode('tierliebe_quiz', 'tierliebe_quiz_shortcode_new');
