/**
 * Tierliebe Quiz - Bereitschaftstest
 * Extrahiert aus index2.html
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
            <input type="radio" name="q${q.number}" id="${a.id}" value="${a.value}">
            <label for="${a.id}">
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

    if (prevBtn) prevBtn.classList.toggle('uk-hidden', currentQuestionIndex === 0);
    if (nextBtn) nextBtn.classList.toggle('uk-hidden', currentQuestionIndex === totalQuestions - 1);
    if (submitBtn) submitBtn.classList.toggle('uk-hidden', currentQuestionIndex !== totalQuestions - 1);
}

function updateProgress() {
    let answeredCount = 0;
    for (let i = 1; i <= totalQuestions; i++) {
        if (getAnswer(i)) answeredCount++;
    }
    const progress = (answeredCount / totalQuestions) * 100;
    const progressFill = document.getElementById('progress-fill');
    const currentQuestion = document.getElementById('current-question');

    if (progressFill) progressFill.style.width = progress + '%';
    if (currentQuestion) currentQuestion.textContent = answeredCount;
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

    // TIME
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

    // MONEY
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

    // MOTIVATION
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

    // KNOWLEDGE
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

    // SPACE
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

    // Generate result HTML
    let resultType, resultIcon, resultTitle, resultHTML;

    if (knockouts.length > 0 || totalScore < 20) {
        resultType = 'knockout';
        resultIcon = '😢';
        resultTitle = 'Absolut nicht bereit';
        resultHTML = generateResultHTML(resultType, resultIcon, resultTitle, totalScore, strengths, issues, knockouts, recommendations, suitableAnimals);
    } else if (totalScore < 35) {
        resultType = 'very-bad';
        resultIcon = '😔';
        resultTitle = 'Nicht bereit - Massive Defizite';
        resultHTML = generateResultHTML(resultType, resultIcon, resultTitle, totalScore, strengths, issues, knockouts, recommendations, suitableAnimals);
    } else if (totalScore < 50) {
        resultType = 'bad';
        resultIcon = '😕';
        resultTitle = 'Noch nicht bereit - Viele Lücken';
        resultHTML = generateResultHTML(resultType, resultIcon, resultTitle, totalScore, strengths, issues, knockouts, recommendations, suitableAnimals);
    } else if (totalScore < 65) {
        resultType = 'mediocre';
        resultIcon = '🌱';
        resultTitle = 'Teilweise bereit - Arbeit nötig';
        resultHTML = generateResultHTML(resultType, resultIcon, resultTitle, totalScore, strengths, issues, knockouts, recommendations, suitableAnimals);
    } else if (totalScore < 75) {
        resultType = 'okay';
        resultIcon = '👍';
        resultTitle = 'Grundsätzlich bereit!';
        resultHTML = generateResultHTML(resultType, resultIcon, resultTitle, totalScore, strengths, issues, knockouts, recommendations, suitableAnimals);
    } else if (totalScore < 85) {
        resultType = 'good';
        resultIcon = '✨';
        resultTitle = 'Bereit für ein Tier!';
        resultHTML = generateResultHTML(resultType, resultIcon, resultTitle, totalScore, strengths, issues, knockouts, recommendations, suitableAnimals);
    } else if (totalScore < 95) {
        resultType = 'very-good';
        resultIcon = '🌟';
        resultTitle = 'Hervorragend vorbereitet!';
        resultHTML = generateResultHTML(resultType, resultIcon, resultTitle, totalScore, strengths, issues, knockouts, recommendations, suitableAnimals);
    } else {
        resultType = 'perfect';
        resultIcon = '❤️';
        resultTitle = 'Perfekt - Du bist ein Held!';
        resultHTML = generateResultHTML(resultType, resultIcon, resultTitle, totalScore, strengths, issues, knockouts, recommendations, suitableAnimals);
    }

    return {
        type: resultType,
        html: resultHTML
    };
}

function generateResultHTML(type, icon, title, score, strengths, issues, knockouts, recommendations, suitableAnimals) {
    let html = `
        <div class="result-header">
            <div class="result-icon">${icon}</div>
            <h2 class="result-title">${title}</h2>
            <p class="result-score">Score: ${Math.round(score)}/100</p>
        </div>
    `;

    // Knockouts
    if (knockouts && knockouts.length > 0) {
        html += `
            <div class="result-section issues">
                <h4>🚫 Knockout-Kriterien</h4>
                <ul>${knockouts.map(k => `<li><strong>${k.text}:</strong> ${k.detail}</li>`).join('')}</ul>
            </div>
        `;
    }

    // Strengths
    if (strengths && strengths.length > 0) {
        html += `
            <div class="result-section strengths">
                <h4>✅ Deine Stärken</h4>
                <ul>${strengths.map(s => `<li>${s}</li>`).join('')}</ul>
            </div>
        `;
    }

    // Issues
    if (issues && issues.length > 0) {
        html += `
            <div class="result-section issues">
                <h4>❌ Problembereiche</h4>
                <ul>${issues.map(i => `<li>${i}</li>`).join('')}</ul>
            </div>
        `;
    }

    // Suitable Animals
    if (suitableAnimals && suitableAnimals.length > 0 && score >= 65) {
        html += `
            <div class="result-section animals">
                <h4>🐾 Geeignete Tierarten</h4>
                <ul>${suitableAnimals.map(a => `<li><strong>${a.name}</strong> - ${a.requirements}</li>`).join('')}</ul>
            </div>
        `;
    }

    // Recommendations
    if (recommendations && recommendations.length > 0) {
        html += `
            <div class="result-section recommendations">
                <h4>💡 Nächste Schritte</h4>
                <ol>${recommendations.map(r => `<li>${r.action} <em>(${r.timeframe})</em></li>`).join('')}</ol>
            </div>
        `;
    }

    // Final messages based on type
    if (type === 'perfect') {
        html += `
            <div class="result-section" style="background: linear-gradient(135deg, var(--cute-coral), #FF7B7F); color: white; padding: 35px; border-radius: 25px; text-align: center; border: none;">
                <p style="font-size: 1.5rem; font-weight: 700; margin: 0; line-height: 1.5;">
                    Menschen wie du retten Tierleben.<br>Du bist ein Held! ❤️🐾
                </p>
            </div>
        `;
    } else if (score >= 65) {
        html += `
            <div class="result-section" style="border-color: var(--pastel-mint);">
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
    } else if (knockouts.length > 0 || score < 35) {
        html += `
            <p style="margin-top: 25px; padding: 20px; background: var(--pastel-cream); border-radius: 15px; font-weight: 600; text-align: center;">
                💕 Alternative: Unterstütze Tiere über Patenschaften, Spenden oder Ehrenamt im Tierheim.
            </p>
        `;
    }

    return html;
}

function showResult(result) {
    const resultContent = document.getElementById('result-content');
    if (!resultContent) return;

    resultContent.innerHTML = `
        <div class="result-container ${result.type}">
            ${result.html}
            <div style="text-align: center; margin-top: 50px;">
                <button class="uk-button uk-button-default" onclick="resetTest()">🔄 Test wiederholen</button>
            </div>
        </div>
    `;

    setTimeout(() => {
        resultContent.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }, 100);
}

function resetTest() {
    const resultContent = document.getElementById('result-content');
    if (resultContent) resultContent.innerHTML = '';

    initTest();

    setTimeout(() => {
        document.getElementById('questions-container').scrollIntoView({ behavior: 'smooth', block: 'start' });
    }, 100);
}

// Initialize quiz on page load
document.addEventListener('DOMContentLoaded', function() {
    const testForm = document.getElementById('test-form');
    if (!testForm) return;

    // Initialize
    initTest();

    // Form submit handler
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

    // Button handlers
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    if (prevBtn) prevBtn.addEventListener('click', () => changeQuestion(-1));
    if (nextBtn) nextBtn.addEventListener('click', () => changeQuestion(1));
});
