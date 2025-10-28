/**
 * Tierliebe Quiz - JavaScript Logic
 * Handles quiz questions, scoring, and result evaluation
 */

// Quiz Questions
const questions = [
    {
        number: 1,
        question: "Wie lange bist du werktags außer Haus (Arbeit, Schule, Studium)?",
        answers: [
            { id: "q1a", value: "1", text: "Weniger als 4 Stunden" },
            { id: "q1b", value: "2", text: "4–6 Stunden" },
            { id: "q1c", value: "3", text: "6–8 Stunden" },
            { id: "q1d", value: "4", text: "Mehr als 8 Stunden" }
        ]
    },
    {
        number: 2,
        question: "Kann dein Tier dich regelmäßig begleiten oder betreut werden?",
        answers: [
            { id: "q2a", value: "1", text: "Ja, fast immer" },
            { id: "q2b", value: "2", text: "Manchmal" },
            { id: "q2c", value: "3", text: "Nein, es wäre meist allein" }
        ]
    },
    {
        number: 3,
        question: "Warum möchtest du ein Tier?",
        answers: [
            { id: "q3a", value: "1", text: "Um einem Tier aus dem Tierschutz ein Zuhause zu geben" },
            { id: "q3b", value: "2", text: "Aus Liebe zu Tieren, ich möchte langfristig Verantwortung übernehmen" },
            { id: "q3c", value: "3", text: "Ich möchte Gesellschaft / Unterhaltung" },
            { id: "q3d", value: "4", text: "Mein Kind / Partner möchte eins" },
            { id: "q3e", value: "5", text: "Ich finde Tiere süß, es wäre schön eins zu haben" }
        ]
    },
    {
        number: 4,
        question: "Wie viel Geld kannst du pro Monat realistisch für ein Tier ausgeben?",
        answers: [
            { id: "q4a", value: "1", text: "Unter 50€" },
            { id: "q4b", value: "2", text: "50–100€" },
            { id: "q4c", value: "3", text: "100–200€" },
            { id: "q4d", value: "4", text: "Über 200€" }
        ]
    },
    {
        number: 5,
        question: "Wärst du in der Lage, im Notfall mehrere Tausend Euro für eine Tierbehandlung zu bezahlen?",
        answers: [
            { id: "q5a", value: "1", text: "Ja" },
            { id: "q5b", value: "2", text: "Mit Einschränkungen / müsste ich mir stark überlegen" },
            { id: "q5c", value: "3", text: "Nein" }
        ]
    },
    {
        number: 6,
        question: "Welche Wohnsituation hast du?",
        answers: [
            { id: "q6a", value: "1", text: "Wohnung ohne Balkon/Garten" },
            { id: "q6b", value: "2", text: "Wohnung mit Balkon/Garten" },
            { id: "q6c", value: "3", text: "Haus mit Garten" },
            { id: "q6d", value: "4", text: "Ländlich mit großem Grundstück" }
        ]
    },
    {
        number: 7,
        question: "Wie viel Platz hast du für Käfig/Gehege/Voliere?",
        answers: [
            { id: "q7a", value: "1", text: "Nur kleiner Käfig möglich" },
            { id: "q7b", value: "2", text: "Mittelgroßer Bereich (z. B. ein Zimmerteil, kleiner Balkon)" },
            { id: "q7c", value: "3", text: "Mehrere m² Platz / eigener Raum" },
            { id: "q7d", value: "4", text: "Garten oder große Voliere möglich" }
        ]
    },
    {
        number: 8,
        question: "Wie gut kennst du die Bedürfnisse der Tierart, die dich interessiert?",
        answers: [
            { id: "q8a", value: "1", text: "Ich habe mich gründlich informiert (Fachbücher, Tierschutzseiten, Tierärzte)" },
            { id: "q8b", value: "2", text: "Ich kenne mich ein bisschen aus" },
            { id: "q8c", value: "3", text: "Ich verlasse mich auf Ratschläge von Freunden, Familie oder Zoohandel" },
            { id: "q8d", value: "4", text: "Gar nicht, ich probiere es aus" }
        ]
    }
];

let currentQuestionIndex = 0;
const totalQuestions = questions.length;
const userAnswers = {};

function initTest() {
    currentQuestionIndex = 0;
    Object.keys(userAnswers).forEach(key => delete userAnswers[key]);
    renderQuestion(currentQuestionIndex);
    updateProgress();
    updateNavigationButtons();
}

function renderQuestion(index) {
    const q = questions[index];
    const answersHTML = q.answers.map(a => `
        <div class="answer-option">
            <label for="${a.id}">
                <input type="radio" name="q${q.number}" id="${a.id}" value="${a.value}">
                ${a.text}
            </label>
        </div>
    `).join('');

    document.getElementById('questions-container').innerHTML = `
        <div class="question-card">
            <div class="question-header">
                <span class="question-number">${q.number}</span>
                <div class="question-text">${q.question}</div>
            </div>
            <div class="answers-container">
                ${answersHTML}
            </div>
        </div>
    `;

    if (userAnswers[q.number]) {
        const radio = document.querySelector(`input[name="q${q.number}"][value="${userAnswers[q.number]}"]`);
        if (radio) radio.checked = true;
    }

    document.querySelectorAll('input[type="radio"]').forEach(radio => {
        radio.addEventListener('change', (e) => {
            userAnswers[q.number] = e.target.value;
            updateProgress();
        });
    });
}

function getAnswer(questionNumber) {
    return userAnswers[questionNumber] || null;
}

function changeQuestion(direction) {
    const currentAnswer = getAnswer(questions[currentQuestionIndex].number);

    if (direction === 1 && !currentAnswer) {
        alert('Bitte wähle eine Antwort aus! 💕');
        return;
    }

    currentQuestionIndex += direction;

    if (currentQuestionIndex >= 0 && currentQuestionIndex < totalQuestions) {
        renderQuestion(currentQuestionIndex);
        updateNavigationButtons();
        updateProgress();
        document.getElementById('questions-container').scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
}

function updateNavigationButtons() {
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');

    prevBtn.classList.toggle('hidden', currentQuestionIndex === 0);
    nextBtn.classList.toggle('hidden', currentQuestionIndex === totalQuestions - 1);
    submitBtn.classList.toggle('hidden', currentQuestionIndex !== totalQuestions - 1);
}

function updateProgress() {
    let answeredCount = 0;
    for (let i = 1; i <= totalQuestions; i++) {
        if (getAnswer(i)) answeredCount++;
    }
    const progress = (answeredCount / totalQuestions) * 100;
    document.getElementById('progress-fill').style.width = progress + '%';
    document.getElementById('current-question').textContent = answeredCount;
}

function evaluateTest(answers) {
    // Scoring system
    const scores = {
        time: 0,
        money: 0,
        motivation: 0,
        knowledge: 0,
        space: 0
    };

    // TIME SCORE
    if (answers.q1 === 1) scores.time = 100;
    else if (answers.q1 === 2) scores.time = 70;
    else if (answers.q1 === 3) scores.time = 40;
    else scores.time = 0;

    if (answers.q2 === 1) scores.time = Math.min(100, scores.time + 20);
    else if (answers.q2 === 2) scores.time = scores.time;
    else scores.time = Math.max(0, scores.time - 30);

    // MONEY SCORE
    if (answers.q4 === 1) scores.money = 0;
    else if (answers.q4 === 2) scores.money = 40;
    else if (answers.q4 === 3) scores.money = 70;
    else scores.money = 90;

    if (answers.q5 === 1) scores.money = Math.min(100, scores.money + 30);
    else if (answers.q5 === 2) scores.money = Math.max(0, scores.money - 20);
    else scores.money = 0;

    // MOTIVATION SCORE
    if (answers.q3 === 1) scores.motivation = 100;
    else if (answers.q3 === 2) scores.motivation = 90;
    else if (answers.q3 === 3) scores.motivation = 30;
    else if (answers.q3 === 4) scores.motivation = 0;
    else scores.motivation = 0;

    // KNOWLEDGE SCORE
    if (answers.q8 === 1) scores.knowledge = 100;
    else if (answers.q8 === 2) scores.knowledge = 60;
    else if (answers.q8 === 3) scores.knowledge = 20;
    else scores.knowledge = 0;

    // SPACE SCORE
    if (answers.q7 === 1) scores.space = 0;
    else if (answers.q7 === 2) scores.space = 50;
    else if (answers.q7 === 3) scores.space = 80;
    else scores.space = 100;

    if (answers.q6 === 4) scores.space = Math.min(100, scores.space + 20);
    else if (answers.q6 === 3) scores.space = Math.min(100, scores.space + 10);

    // TOTAL SCORE
    const totalScore =
        scores.time * 0.25 +
        scores.money * 0.25 +
        scores.motivation * 0.30 +
        scores.knowledge * 0.15 +
        scores.space * 0.05;

    // KNOCKOUTS
    const knockouts = [];
    if (scores.motivation === 0) knockouts.push({
        text: 'Deine Motivation ist inakzeptabel',
        detail: 'Tiere sind keine Geschenke oder Dekoration.'
    });
    if (scores.money === 0) knockouts.push({
        text: 'Finanziell nicht tragbar',
        detail: 'Ohne Notfall-Rücklage kannst du im Ernstfall kein Tier retten.'
    });
    if (scores.time === 0) knockouts.push({
        text: 'Keine Zeit für ein Tier',
        detail: 'Mehr als 8h außer Haus ohne Betreuung = Tierquälerei.'
    });
    if (scores.space === 0) knockouts.push({
        text: 'Käfighaltung ist Tierquälerei',
        detail: 'Kein Tier passt in einen kleinen Käfig.'
    });
    if (scores.knowledge === 0) knockouts.push({
        text: 'Null Vorbereitung',
        detail: 'Sich gar nicht zu informieren ist grob fahrlässig.'
    });

    // Analyze strengths and issues
    const issues = [];
    const strengths = [];
    const recommendations = [];

    if (scores.time >= 80) {
        strengths.push('⏰ Zeit: Sehr gut! Du hast ausreichend Zeit.');
    } else if (scores.time >= 60) {
        strengths.push('⏰ Zeit: Gut. Mit Betreuung machbar.');
    } else if (scores.time >= 30) {
        issues.push('⏰ Zeit: Kritisch. 6-8h außer Haus ist grenzwertig.');
        recommendations.push({
            priority: 2,
            action: 'Organisiere zuverlässige Betreuung',
            timeframe: 'Vor Anschaffung'
        });
    } else {
        issues.push('⏰ Zeit: Inakzeptabel. >8h allein = Tierquälerei.');
        recommendations.push({
            priority: 1,
            action: 'Warte, bis sich deine Arbeitssituation ändert',
            timeframe: 'Minimum 1 Jahr'
        });
    }

    if (scores.money >= 90) {
        strengths.push('💰 Finanzen: Hervorragend. Budget + Notfall-Rücklage vorhanden.');
    } else if (scores.money >= 60) {
        strengths.push('💰 Finanzen: Solide Basis.');
        recommendations.push({
            priority: 2,
            action: 'Spare 2.000€ als Tier-Notfall-Budget an',
            timeframe: '6-12 Monate'
        });
    } else if (scores.money >= 30) {
        issues.push('💰 Finanzen: Zu knapp. 50-100€/Monat reicht kaum.');
        recommendations.push({
            priority: 1,
            action: 'Erhöhe dein Budget auf mind. 150€/Monat + 2.000€ Reserve',
            timeframe: '12-24 Monate'
        });
    } else {
        issues.push('💰 Finanzen: Nicht tragbar. Ohne Geld kein Tier.');
        recommendations.push({
            priority: 1,
            action: 'Stabilisiere erst deine finanzielle Situation',
            timeframe: 'Unbegrenzt'
        });
    }

    if (scores.motivation >= 90) {
        strengths.push('❤️ Motivation: Perfekt! Du verstehst die Verantwortung.');
    } else if (scores.motivation >= 60) {
        strengths.push('❤️ Motivation: Okay, prüfe deine Erwartungen.');
    } else {
        issues.push('❤️ Motivation: Falsche Gründe. Tiere sind keine Deko.');
        recommendations.push({
            priority: 1,
            action: 'Überdenke deine Motivation fundamental',
            timeframe: 'Jetzt'
        });
    }

    if (scores.knowledge >= 90) {
        strengths.push('📚 Wissen: Sehr gut vorbereitet!');
    } else if (scores.knowledge >= 50) {
        issues.push('📚 Wissen: Lückenhaft. Informiere dich noch mehr.');
        recommendations.push({
            priority: 2,
            action: 'Lies 2-3 Fachbücher, besuche Tierheime',
            timeframe: '2-3 Monate'
        });
    } else {
        issues.push('📚 Wissen: Gefährlich wenig!');
        recommendations.push({
            priority: 1,
            action: 'DRINGEND: Gründliche Recherche bei seriösen Quellen',
            timeframe: '3-6 Monate'
        });
    }

    if (scores.space >= 80) {
        strengths.push('🏡 Platz: Ausgezeichnet. Artgerechte Haltung möglich.');
    } else if (scores.space >= 50) {
        strengths.push('🏡 Platz: Ausreichend für bestimmte Tierarten.');
    } else {
        issues.push('🏡 Platz: Zu wenig. Käfig = Tierquälerei.');
        recommendations.push({
            priority: 1,
            action: 'Warte auf größere Wohnung',
            timeframe: 'Unbegrenzt'
        });
    }

    // Suitable animals
    const suitableAnimals = [];
    if (scores.time >= 70 && scores.money >= 70) {
        if (scores.space >= 80) {
            suitableAnimals.push({name: 'Hund', requirements: 'Braucht 3-5h täglich, großen Auslauf, Hundeschule'});
        }
        if (scores.space >= 50) {
            suitableAnimals.push({name: '2 Katzen', requirements: 'MINDESTENS zu zweit, Freigang oder große Wohnung'});
        }
        if (scores.space >= 70) {
            suitableAnimals.push({name: '2+ Kaninchen', requirements: 'Großes Gehege (min. 6m²), kein Käfig!'});
        }
    }

    recommendations.sort((a, b) => a.priority - b.priority);

    // Generate result based on score
    let resultType, resultIcon, resultTitle, resultHTML;

    if (knockouts.length > 0 || totalScore < 20) {
        resultType = 'knockout';
        resultIcon = '😢';
        resultTitle = 'Absolut nicht bereit';
        resultHTML = `
            <div class="result-header">
                <div class="result-icon">${resultIcon}</div>
                <h2 class="result-title">${resultTitle}</h2>
                <p class="result-score">Score: ${Math.round(totalScore)}/100</p>
            </div>
            ${knockouts.length > 0 ? `
            <div class="result-section issues">
                <h4>🚫 Knockout-Kriterien</h4>
                <ul>${knockouts.map(k => `<li><strong>${k.text}:</strong> ${k.detail}</li>`).join('')}</ul>
            </div>` : ''}
            ${issues.length > 0 ? `
            <div class="result-section issues">
                <h4>❌ Zusätzliche Probleme</h4>
                <ul>${issues.map(i => `<li>${i}</li>`).join('')}</ul>
            </div>` : ''}
            <div class="result-section recommendations">
                <h4>💡 Was du JETZT tun musst</h4>
                <ol>${recommendations.map(r => `<li><strong>Priorität ${r.priority}:</strong> ${r.action} <em>(${r.timeframe})</em></li>`).join('')}</ol>
                <p style="margin-top: 20px; font-weight: 600;">💕 Alternative: Unterstütze Tiere über Patenschaften, Spenden oder Ehrenamt im Tierheim.</p>
            </div>
        `;
    } else if (totalScore < 35) {
        resultType = 'very-bad';
        resultIcon = '😔';
        resultTitle = 'Nicht bereit - Massive Defizite';
        resultHTML = `
            <div class="result-header">
                <div class="result-icon">${resultIcon}</div>
                <h2 class="result-title">${resultTitle}</h2>
                <p class="result-score">Score: ${Math.round(totalScore)}/100</p>
            </div>
            <div class="result-section issues">
                <h4>❌ Massive Problembereiche</h4>
                <ul>${issues.map(i => `<li>${i}</li>`).join('')}</ul>
            </div>
            <div class="result-section recommendations">
                <h4>📋 Handlungsplan (12-24 Monate)</h4>
                <ol>${recommendations.map(r => `<li>${r.action} <em>(${r.timeframe})</em></li>`).join('')}</ol>
            </div>
        `;
    } else if (totalScore < 50) {
        resultType = 'bad';
        resultIcon = '😕';
        resultTitle = 'Noch nicht bereit - Viele Lücken';
        resultHTML = `
            <div class="result-header">
                <div class="result-icon">${resultIcon}</div>
                <h2 class="result-title">${resultTitle}</h2>
                <p class="result-score">Score: ${Math.round(totalScore)}/100</p>
            </div>
            ${strengths.length > 0 ? `
            <div class="result-section strengths">
                <h4>✅ Positive Aspekte</h4>
                <ul>${strengths.map(s => `<li>${s}</li>`).join('')}</ul>
            </div>` : ''}
            <div class="result-section issues">
                <h4>⚠️ Kritische Lücken</h4>
                <ul>${issues.map(i => `<li>${i}</li>`).join('')}</ul>
            </div>
            <div class="result-section recommendations">
                <h4>📋 Dein Weg zum Tier (ca. 12-24 Monate)</h4>
                <ol>${recommendations.map(r => `<li>${r.action} <em>(${r.timeframe})</em></li>`).join('')}</ol>
            </div>
        `;
    } else if (totalScore < 65) {
        resultType = 'mediocre';
        resultIcon = '🌱';
        resultTitle = 'Teilweise bereit - Arbeit nötig';
        resultHTML = `
            <div class="result-header">
                <div class="result-icon">${resultIcon}</div>
                <h2 class="result-title">${resultTitle}</h2>
                <p class="result-score">Score: ${Math.round(totalScore)}/100</p>
                <p style="font-size: 1.1rem;">Du bist auf dem richtigen Weg, aber noch nicht da!</p>
            </div>
            <div class="result-section strengths">
                <h4>✅ Deine Stärken</h4>
                <ul>${strengths.map(s => `<li>${s}</li>`).join('')}</ul>
            </div>
            ${issues.length > 0 ? `
            <div class="result-section issues">
                <h4>⚠️ Verbesserungsbedarf</h4>
                <ul>${issues.map(i => `<li>${i}</li>`).join('')}</ul>
            </div>` : ''}
            <div class="result-section recommendations">
                <h4>📋 Nächste Schritte (6-12 Monate)</h4>
                <ol>${recommendations.map(r => `<li>${r.action} <em>(${r.timeframe})</em></li>`).join('')}</ol>
            </div>
        `;
    } else if (totalScore < 75) {
        resultType = 'okay';
        resultIcon = '👍';
        resultTitle = 'Grundsätzlich bereit!';
        resultHTML = `
            <div class="result-header">
                <div class="result-icon">${resultIcon}</div>
                <h2 class="result-title">${resultTitle}</h2>
                <p class="result-score">Score: ${Math.round(totalScore)}/100 - Solide Basis!</p>
            </div>
            <div class="result-section strengths">
                <h4>✅ Deine Stärken</h4>
                <ul>${strengths.map(s => `<li>${s}</li>`).join('')}</ul>
            </div>
            ${suitableAnimals.length > 0 ? `
            <div class="result-section animals">
                <h4>🐾 Diese Tiere könnten passen</h4>
                <ul>${suitableAnimals.map(a => `<li><strong>${a.name}</strong> - ${a.requirements}</li>`).join('')}</ul>
            </div>` : ''}
            ${recommendations.length > 0 ? `
            <div class="result-section recommendations">
                <h4>💡 Optimierungen (3-6 Monate)</h4>
                <ul>${recommendations.map(r => `<li>${r.action} <em>(${r.timeframe})</em></li>`).join('')}</ul>
            </div>` : ''}
            <div class="result-section" style="border-color: #B8E6D5;">
                <h4>🏠 Nächste Schritte</h4>
                <ul>
                    <li>Besuche lokale Tierheime</li>
                    <li>Lass dich von Tierschutzvereinen beraten</li>
                    <li>NIEMALS im Zoohandel oder bei Züchtern kaufen!</li>
                </ul>
            </div>
        `;
    } else if (totalScore < 85) {
        resultType = 'good';
        resultIcon = '✨';
        resultTitle = 'Bereit für ein Tier!';
        resultHTML = `
            <div class="result-header">
                <div class="result-icon">${resultIcon}</div>
                <h2 class="result-title">${resultTitle}</h2>
                <p class="result-score">Score: ${Math.round(totalScore)}/100 - Sehr gut!</p>
            </div>
            <div class="result-section strengths">
                <h4>✅ Deine Stärken</h4>
                <ul>${strengths.map(s => `<li>${s}</li>`).join('')}</ul>
            </div>
            ${suitableAnimals.length > 0 ? `
            <div class="result-section animals">
                <h4>🐾 Empfohlene Tierarten</h4>
                <ul>${suitableAnimals.map(a => `<li><strong>${a.name}</strong> - ${a.requirements}</li>`).join('')}</ul>
            </div>` : ''}
            <div class="result-section" style="border-color: #A0E7E5;">
                <h4>🏠 So geht's weiter</h4>
                <ul>
                    <li>Besuche mehrere Tierheime in deiner Region</li>
                    <li>Nimm dir Zeit beim Kennenlernen - Chemie muss stimmen!</li>
                    <li>Lass dich vom Tierheim beraten - die kennen ihre Tiere</li>
                    <li>Bereite dein Zuhause VOR der Anschaffung vor</li>
                </ul>
                <p style="margin-top: 20px; font-weight: 600; font-style: italic;">Denk dran: Kauf NIEMALS im Zoohandel oder bei Züchtern!</p>
            </div>
        `;
    } else if (totalScore < 95) {
        resultType = 'very-good';
        resultIcon = '🌟';
        resultTitle = 'Hervorragend vorbereitet!';
        resultHTML = `
            <div class="result-header">
                <div class="result-icon">${resultIcon}</div>
                <h2 class="result-title">${resultTitle}</h2>
                <p class="result-score">Score: ${Math.round(totalScore)}/100 - Beeindruckend!</p>
            </div>
            <div class="result-section strengths">
                <h4>✅ Deine Stärken</h4>
                <ul>${strengths.map(s => `<li>${s}</li>`).join('')}</ul>
            </div>
            ${suitableAnimals.length > 0 ? `
            <div class="result-section animals">
                <h4>🐾 Perfekt geeignet für</h4>
                <ul>${suitableAnimals.map(a => `<li><strong>${a.name}</strong> - ${a.requirements}</li>`).join('')}</ul>
            </div>` : ''}
            <div class="result-section" style="border-color: #FFD6E8;">
                <h4>🏆 Nächste Schritte</h4>
                <ul>
                    <li>Besuche Tierheime und Pflegestellen</li>
                    <li>Sprich mit den Pflegern über die Charaktere der Tiere</li>
                    <li>Nimm dir Zeit - das richtige Tier findet dich!</li>
                    <li>Bereite dein Zuhause artgerecht vor</li>
                </ul>
                <p style="margin-top: 25px; background: #B8E6D5; padding: 20px; border-radius: 20px; font-weight: 600; text-align: center;">
                    💚 Du bist ein Vorbild! Mit deiner Einstellung rettest du einem Tier das Leben!
                </p>
            </div>
        `;
    } else {
        resultType = 'perfect';
        resultIcon = '❤️';
        resultTitle = 'Perfekt - Du bist ein Held!';
        resultHTML = `
            <div class="result-header">
                <div class="result-icon">${resultIcon}</div>
                <h2 class="result-title">${resultTitle}</h2>
                <p class="result-score">Score: ${Math.round(totalScore)}/100 🎉</p>
                <p style="font-size: 1.3rem; font-weight: 600;">Du hast ALLES richtig gemacht!</p>
            </div>
            <div class="result-section strengths" style="background: linear-gradient(135deg, rgba(184, 230, 213, 0.3), rgba(255, 214, 232, 0.3)); border: none; padding: 40px;">
                <h4 style="font-size: 1.8rem; text-align: center; margin-bottom: 25px;">🏆 Perfekte Vorbereitung!</h4>
                <ul style="font-size: 1.15rem;">${strengths.map(s => `<li>${s}</li>`).join('')}</ul>
            </div>
            ${suitableAnimals.length > 0 ? `
            <div class="result-section animals">
                <h4>🐾 Ideal für dich</h4>
                <ul style="font-size: 1.1rem;">${suitableAnimals.map(a => `<li><strong>${a.name}</strong> - ${a.requirements}</li>`).join('')}</ul>
            </div>` : ''}
            <div class="result-section" style="background: #FFE5D0; border-color: #FF9A9E; padding: 40px;">
                <h4 style="font-size: 1.8rem;">🏠 Hol dir JETZT dein Tier!</h4>
                <ul style="font-size: 1.15rem;">
                    <li>Geh ins Tierheim - dein Tier wartet auf dich!</li>
                    <li>Nimm dir Zeit beim Kennenlernen</li>
                    <li>Höre auf die Tierheim-Mitarbeiter</li>
                    <li>Bereite dein Zuhause liebevoll vor</li>
                </ul>
                <div style="margin-top: 35px; background: linear-gradient(135deg, #FF9A9E, #FF7B7F); color: white; padding: 35px; border-radius: 25px; text-align: center; box-shadow: 0 12px 40px rgba(90, 74, 66, 0.15);">
                    <p style="font-size: 1.5rem; font-weight: 700; margin: 0; line-height: 1.5;">
                        Menschen wie du retten Tierleben.<br>Du bist ein Held! ❤️🐾
                    </p>
                </div>
            </div>
        `;
    }

    return {
        type: resultType,
        html: resultHTML
    };
}

function showResult(result) {
    document.getElementById('result-content').innerHTML = `
        <div class="result-container ${result.type}">
            ${result.html}
        </div>
    `;

    // Hide quiz, show result
    const quizContainer = document.querySelector('.quiz-container');
    if (quizContainer) quizContainer.classList.add('hidden');

    document.getElementById('result').classList.remove('hidden');

    setTimeout(() => {
        document.getElementById('result').scrollIntoView({ behavior: 'smooth' });
    }, 100);
}

function resetTest() {
    document.getElementById('result').classList.add('hidden');

    const quizContainer = document.querySelector('.quiz-container');
    if (quizContainer) quizContainer.classList.remove('hidden');

    initTest();

    setTimeout(() => {
        document.querySelector('.quiz-container').scrollIntoView({ behavior: 'smooth' });
    }, 100);
}

// Initialize quiz when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    const testForm = document.getElementById('test-form');

    if (testForm) {
        // Initialize quiz
        initTest();

        // Add form submit handler
        testForm.addEventListener('submit', function(e) {
            e.preventDefault();

            let allAnswered = true;
            for (let i = 1; i <= totalQuestions; i++) {
                if (!getAnswer(i)) {
                    allAnswered = false;
                    break;
                }
            }

            if (!allAnswered) {
                alert('Bitte beantworte alle Fragen! 💕');
                return;
            }

            const answers = {};
            for (let i = 1; i <= totalQuestions; i++) {
                answers[`q${i}`] = parseInt(getAnswer(i));
            }

            const result = evaluateTest(answers);
            showResult(result);
        });

        // Add navigation button handlers
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');

        if (prevBtn) {
            prevBtn.addEventListener('click', () => changeQuestion(-1));
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => changeQuestion(1));
        }
    }
});
