<?php
include "config.php";
?>

<!--
	Stellar by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Benoit Chocot - CV</title>
		<link rel="icon" href="images/favicon.ico" />
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<span class="logo"><img src="images/logo.svg" alt="" /></span>
						<h1>Curriculum Vitae -  Benoit CHOCOT</h1>
						<?php if (isAdmin()): ?>
							<button id="download-pdf-btn" style="margin-top: 10px;">Télécharger en PDF</button>
						<?php endif; ?>
					</header>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li><a href="#intro" class="active">Introduction</a></li>
							<li><a href="#first">Mes Expériences Professionnelles</a></li>
							<li><a href="#second">Mes Compétences</a></li>
							<li><a href="#third">Mes Passions</a></li>
							<li><a href="#footer">Mes Informations Personnelles</a></li>
						</ul>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Introduction -->
							<section id="intro" class="main">
								<div class="spotlight">
									<div class="content">
										<header class="major">
											<h2>Introduction</h2>
											<img src="images/qr-code.png" alt="qrcode" style="width:60px;" />
											<div> ou <a id="linkedin-link-intro" href="https://www.linkedin.com/in/benoit-chocot/">mon LinkedIn</a></div>
										</header>
										
										<p>Je m'appelle Benoit CHOCOT, et je suis actuellement en recherche d'emploi pour le poste de Développeur d'applications web

										Bonne lecture !</p>
										
									<!--	<ul class="actions">
											<li><a href="generic.html" class="button">Learn More</a></li>
										</ul>
									-->
								</div>
									<span class="image"><img src="images/pp.png" alt="" /></span>
								</div>
							</section>

						<!-- Expériences -->


<section id="first" class="main special">
    <header class="major">
        <h2>Mes Expériences Professionnelles</h2>
    </header>
    <ul id="experience-list" class="features"></ul>

    <?php if (isAdmin()): ?>
        <button onclick="showAddForm()">Ajouter une expérience</button>
        
        <div id="add-form" style="display:none;">
            <input type="text" id="entreprise" placeholder="Entreprise">
            <input type="text" id="poste" placeholder="Poste">
            <input type="text" id="periode" placeholder="Période">
            <textarea id="description" placeholder="Description"></textarea>
            <button onclick="addExperience()">Enregistrer</button>
        </div>
    <div id="edit-form" style="display:none;">
        <input type="hidden" id="edit-id">
        <input type="text" id="edit-entreprise" placeholder="Entreprise">
        <input type="text" id="edit-poste" placeholder="Poste">
        <input type="text" id="edit-periode" placeholder="Période">
        <textarea id="edit-description" placeholder="Description"></textarea>
        <button onclick="updateExperience()">Enregistrer</button>
        <button onclick="document.getElementById('edit-form').style.display='none'">Annuler</button>
    </div>

    <?php endif; ?>
    <header class="major">
        <h2>Mes Expériences en détail</h2>
    </header>
    <div id="description-list"></div>
    
    <?php if (isAdmin()): ?>
        <button onclick="showDescriptionForm()">Ajouter une description</button>

        <!-- Formulaire pour ajouter une description -->
        <div id="description-form" style="display:none;">
            <input type="text" id="desc-entreprise" placeholder="Entreprise">
            <textarea id="desc-contenu" placeholder="Description"></textarea>
            <button onclick="addDescription()">Enregistrer</button>
        </div>
    <?php endif; ?>
							<!--	<footer class="major">
									<ul class="actions special">
										<li><a href="generic.html" class="button">Learn More</a></li>
									</ul>
							</footer> -->
							
							</section>

						<!-- Compétences -->
<section id="second" class="main special">
    <header class="major">
        <h2>Mes Compétences</h2>
    </header>
    <div id="skills-table-wrapper">
		<table id="skills-table">
			<tbody></tbody>
		</table>
	</div>

    <?php if (isAdmin()): ?>
        <button onclick="showSkillForm()">Ajouter une compétence</button>

        <!-- Formulaire pour ajouter/modifier une compétence -->
        <div id="skill-form" style="display:none;">
            <input type="hidden" id="skill-id">
            <input type="text" id="skill-name" placeholder="Nom de la compétence">
            <button onclick="saveSkill()">Enregistrer</button>
        </div>
    <?php endif; ?>
							<!--	<footer class="major">
									<ul class="actions special">
										<li><a href="generic.html" class="button">Learn More</a></li>
									</ul>
								</footer>
							-->
							</section>


													<!-- Passions -->
							<section id="third" class="main special">
								<header class="major">
									<h2>Mes Passions</h2>
									<p>Dans la vie, j'aime faire du sport, faire de la veille sur les nouvelles technologies, aussi bien sur des 
										composants informatiques que sur les langages de programmation, regarder du contenu en direct sur Twitch ainsi que les jeux vidéos. <br>
									</p>
								</header>
							</section>

						<!-- Contacts -->


					</div>

				<!-- Footer -->
					<footer id="footer">
						<section>
							<h2>Mes informations personnelles</h2>
							<dl class="alt">
								<dt>Email</dt>
								<dd><a href="mailto:benoit.chocot@gmail.com">benoit.chocot@gmail.com</a></dd>	
								<dt>Permis</dt>
								<dd>B</dd>
								<dd>Merci d'avoir lu !</dd>
							</dl>
							<ul class="icons">
								<li><a href="https://fr-fr.facebook.com/benoit.chocot" class="icon brands fa-facebook-f alt"><span class="label">Facebook</span></a></li>
								<li><a href="https://www.instagram.com/bonoit_/" class="icon brands fa-instagram alt"><span class="label">Instagram</span></a></li>
								<li><a href="https://www.linkedin.com/in/benoit-chocot/" class="icon brands fa-linkedin alt"><span class="label">LinkedIn</span></a></li>
								<li><a href="https://github.com/benoitchocot" class="icon brands fa-github alt"><span class="label">GitHub</span></a></li>
								<!-- <li><a href="https://twitch.tv/bonoitswag" class="icon brands fa-twitch alt"><span class="label">Twitch</span></a></li> -->
							</ul>
						</section>
						<p class="copyright">&copy; CV Benoit Chocot</p>
					</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
<script>
// Variable globale pour stocker les compétences
let allSkillsData = []; 

document.addEventListener("DOMContentLoaded", loadSkills); 

function loadSkills() {
    fetch("api_skills.php")
        .then(res => res.json())
        .then(data => {
            allSkillsData = data; // Stocker les données globalement
            let tableBody = document.getElementById("skills-table").getElementsByTagName("tbody")[0];
            tableBody.innerHTML = ""; // Reset du tableau

            let row;
            data.forEach((skill, index) => {
                if (index % 5 === 0) { 
                    row = tableBody.insertRow(); 
                }

                let cell = row.insertCell(); 
                cell.textContent = skill.nom; 

                if (isAdmin()) {
                    let editBtn = document.createElement("button");
                    editBtn.textContent = "✏️";
                    editBtn.onclick = () => editSkill(skill.id, skill.nom); 
                    cell.appendChild(editBtn);

                    let deleteBtn = document.createElement("button");
                    deleteBtn.textContent = "🗑️";
                    deleteBtn.onclick = () => deleteSkill(skill.id);
                    cell.appendChild(deleteBtn);
                }
            });
        });
}

function showSkillForm() {
    document.getElementById("skill-form").style.display = "block";
    document.getElementById("skill-id").value = ""; 
    document.getElementById("skill-name").value = ""; 
}

function saveSkill() {
    let id = document.getElementById("skill-id").value;
    let name = document.getElementById("skill-name").value;

    if (!name.trim()) {
        alert("Le nom de la compétence ne peut pas être vide.");
        return;
    }

    let method = id ? "PUT" : "POST";
    let payload = id ? { id: id, nom: name } : { nom: name };

    fetch("api_skills.php", {
        method: method,
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(payload)
    }).then(response => {
        if (!response.ok) {
            throw new Error('La réponse du serveur n\'est pas OK');
        }
        return response.json();
    }).then(() => {
        loadSkills(); 
        document.getElementById("skill-form").style.display = "none";
    }).catch(error => {
        console.error('Erreur lors de l\'enregistrement de la compétence:', error);
    });
}

function editSkill(id, name) {
    document.getElementById("skill-form").style.display = "block";
    document.getElementById("skill-id").value = id;
    document.getElementById("skill-name").value = name; 
}

function deleteSkill(id) {
    fetch("api_skills.php", {
        method: "DELETE",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id: id })
    }).then(response => {
        if (!response.ok) {
            throw new Error('La réponse du serveur n\'est pas OK');
        }
        return response.json();
    }).then(() => {
        loadSkills(); 
    }).catch(error => {
        console.error('Erreur lors de la suppression de la compétence:', error);
    });
}

function isAdmin() {
    return <?php echo json_encode(isAdmin()); ?>;
}
</script>

<script>
// Section Expériences Professionnelles
let allExperiences = []; 

document.addEventListener("DOMContentLoaded", loadExperiences);

function loadExperiences() {
    fetch("api.php")
        .then(res => res.json())
        .then(data => {
            allExperiences = data; 
            let list = document.getElementById("experience-list");
            list.innerHTML = ""; 

            allExperiences.forEach(exp => {
                let listItem = document.createElement("li");

                let h3 = document.createElement("h3");
                h3.textContent = exp.entreprise;
                listItem.appendChild(h3);

                let h4 = document.createElement("h4");
                h4.textContent = `${exp.poste} - ${exp.periode}`;
                listItem.appendChild(h4);

                let p = document.createElement("p");
                p.textContent = exp.description;
                listItem.appendChild(p);

                if (isAdmin()) {
                    let editButton = document.createElement("button");
                    editButton.textContent = "Modifier";
                    editButton.onclick = () => showEditForm(exp.id);
                    listItem.appendChild(editButton);

                    let deleteButton = document.createElement("button");
                    deleteButton.textContent = "Supprimer";
                    deleteButton.onclick = () => deleteExperience(exp.id);
                    listItem.appendChild(deleteButton);
                }
                list.appendChild(listItem);
            });
        });
}

function showEditForm(id) {
    const experience = allExperiences.find(exp => exp.id === id);
    if (!experience) return;
    
    document.getElementById("edit-id").value = experience.id;
    document.getElementById("edit-entreprise").value = experience.entreprise;
    document.getElementById("edit-poste").value = experience.poste;
    document.getElementById("edit-periode").value = experience.periode;
    document.getElementById("edit-description").value = experience.description;
    document.getElementById("edit-form").style.display = "block";
}

function showAddForm() {
    document.getElementById("add-form").style.display = "block";
    document.getElementById("entreprise").value = "";
    document.getElementById("poste").value = "";
    document.getElementById("periode").value = "";
    document.getElementById("description").value = "";
}

function updateExperience() {
    let data = {
        id: document.getElementById("edit-id").value,
        entreprise: document.getElementById("edit-entreprise").value,
        poste: document.getElementById("edit-poste").value,
        periode: document.getElementById("edit-periode").value,
        description: document.getElementById("edit-description").value
    };

    fetch("api.php", {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
    }).then(response => response.json()) 
      .then(() => {
        loadExperiences(); 
        document.getElementById("edit-form").style.display = "none";
    }).catch(error => console.error('Erreur lors de la mise à jour:', error));
}

function addExperience() {
    let data = {
        entreprise: document.getElementById("entreprise").value,
        poste: document.getElementById("poste").value,
        periode: document.getElementById("periode").value,
        description: document.getElementById("description").value
    };

    fetch("api.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
    }).then(response => response.json()) 
      .then(() => {
        loadExperiences(); 
        document.getElementById("add-form").style.display = "none";
    }).catch(error => console.error('Erreur lors de l\'ajout:', error));
}

function deleteExperience(id) {
    fetch("api.php", {
        method: "DELETE",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id: id })
    }).then(response => response.json()) 
      .then(() => {
        loadExperiences(); 
    }).catch(error => console.error('Erreur lors de la suppression:', error));
}
</script>
<script>
let allDescriptions = []; 

document.addEventListener("DOMContentLoaded", loadDescriptions);

function loadDescriptions() {
    fetch("api_descriptions.php")
        .then(res => res.json())
        .then(data => {
            allDescriptions = data; 
            let list = document.getElementById("description-list");
            list.innerHTML = ""; 

            allDescriptions.forEach(desc => {
                let containerDiv = document.createElement("div");

                let h3 = document.createElement("h3");
                h3.textContent = desc.entreprise;
                containerDiv.appendChild(h3);

                let p = document.createElement("p");
                p.id = `desc-text-${desc.id}`; 
                p.textContent = desc.contenu;
                containerDiv.appendChild(p);

                if (isAdmin()) {
                    let editButton = document.createElement("button");
                    editButton.textContent = "Modifier";
                    editButton.onclick = () => showEditDescriptionForm(desc.id); 
                    containerDiv.appendChild(editButton);

                    let deleteButton = document.createElement("button");
                    deleteButton.textContent = "Supprimer";
                    deleteButton.onclick = () => deleteDescription(desc.id);
                    containerDiv.appendChild(deleteButton);

                    let editFormDiv = document.createElement("div");
                    editFormDiv.id = `edit-desc-form-${desc.id}`; 
                    editFormDiv.style.display = "none"; 

                    let textarea = document.createElement("textarea");
                    textarea.id = `edit-content-${desc.id}`; 
                    textarea.value = desc.contenu; 
                    editFormDiv.appendChild(textarea);

                    let saveButton = document.createElement("button");
                    saveButton.textContent = "Sauvegarder";
                    saveButton.onclick = () => updateDescription(desc.id);
                    editFormDiv.appendChild(saveButton);
                    
                    let cancelButton = document.createElement("button");
                    cancelButton.textContent = "Annuler";
                    cancelButton.onclick = () => hideEditDescriptionForm(desc.id);
                    editFormDiv.appendChild(cancelButton);

                    containerDiv.appendChild(editFormDiv);
                }
                list.appendChild(containerDiv);
            });
        })
        .catch(error => console.error("Erreur de chargement des descriptions :", error));
}

function showDescriptionForm() {
    document.getElementById("description-form").style.display = "block";
    document.getElementById("desc-entreprise").value = "";
    document.getElementById("desc-contenu").value = "";
}

function addDescription() {
    let entreprise = document.getElementById("desc-entreprise").value;
    let contenu = document.getElementById("desc-contenu").value;

    if (!entreprise.trim() || !contenu.trim()) {
        alert("L'entreprise et la description ne peuvent pas être vides.");
        return;
    }

    let data = { entreprise: entreprise, contenu: contenu };

    fetch("api_descriptions.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
    }).then(response => response.json())
      .then(() => {
        loadDescriptions();
        document.getElementById("description-form").style.display = "none";
    }).catch(error => console.error('Erreur lors de l\'ajout de la description:', error));
}

function showEditDescriptionForm(id) {
    allDescriptions.forEach(d => {
        if (d.id !== id) {
            const form = document.getElementById(`edit-desc-form-${d.id}`);
            if (form) form.style.display = "none";
            const text = document.getElementById(`desc-text-${d.id}`);
            if (text) text.style.display = "block"; 
        }
    });

    const form = document.getElementById(`edit-desc-form-${id}`);
    const textDisplay = document.getElementById(`desc-text-${id}`);
    if (form) form.style.display = "block";
    if (textDisplay) textDisplay.style.display = "none"; 

    const description = allDescriptions.find(desc => desc.id === id);
    if (description) {
        const textarea = document.getElementById(`edit-content-${id}`);
        if (textarea) textarea.value = description.contenu;
    }
}

function hideEditDescriptionForm(id) {
    const form = document.getElementById(`edit-desc-form-${id}`);
    const textDisplay = document.getElementById(`desc-text-${id}`);
    if (form) form.style.display = "none";
    if (textDisplay) textDisplay.style.display = "block"; 
}

function updateDescription(id) {
    let updatedContent = document.getElementById(`edit-content-${id}`).value;

    if (!updatedContent.trim()) {
        alert("La description ne peut pas être vide.");
        return;
    }

    fetch("api_descriptions.php", {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id: id, contenu: updatedContent })
    }).then(response => response.json())
      .then(() => {
        loadDescriptions(); 
    }).catch(error => console.error('Erreur lors de la mise à jour de la description:', error));
}

function deleteDescription(id) {
    fetch("api_descriptions.php", {
        method: "DELETE",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id: id })
    }).then(response => response.json())
      .then(() => loadDescriptions())
      .catch(error => console.error('Erreur lors de la suppression de la description:', error));
}

</script>
<script>
    // Fonction pour la génération du PDF
    function generatePdf() {
        const nomPrenom = "Benoit CHOCOT";
        const titre = "Développeur d'applications";
        
        let linkedinUrl = "Non renseigné";
        const linkedinElement = document.getElementById('linkedin-link-intro');
        if (linkedinElement) {
            linkedinUrl = linkedinElement.href;
        }
        
        const permis = "Permis B";
        const telephone = "06 59 93 89 44"; // Numéro à remplacer par le vrai numéro

        // Technologies à mettre en gras (liste non exhaustive, à adapter)
        const techKeywords = [
            'HTML', 'CSS', 'JavaScript', 'PHP', 'Symfony', 'Angular', 'NextJS', 'React', 'Vue', 'Node.js', 
            'Ruby', 'Rails', 'Python', 'Django', 'Java', 'Spring', 'C#', '.NET', 
            'SQL', 'MySQL', 'PostgreSQL', 'MariaDB', 'SQLite3', 'MongoDB', 
            'Prestashop', 'WordPress', 'WooCommerce', 'Docker', 'Kubernetes', 'AWS', 'Azure', 'GCP', 
            'API', 'REST', 'GraphQL', 'Git', 'GitHub', 'GitLab', 'Linux', 'Bash', 'PowerShell', 'Android', 'iOS', 'Swift', 'Kotlin'
        ];

        function highlightTech(description) {
            let highlightedDescription = description;
            techKeywords.forEach(keyword => {
                // Utilisation d'une regex pour ne pas être sensible à la casse et pour s'assurer que le mot est entier
                const regex = new RegExp(`\\b(${keyword})\\b`, 'gi');
                highlightedDescription = highlightedDescription.replace(regex, '<strong>$1</strong>');
            });
            return highlightedDescription;
        }

        let experiencesHtml = '<h2>Expériences Professionnelles</h2>';
        if (allExperiences && allExperiences.length > 0) {
            experiencesHtml += '<ul style="list-style-type: none; padding-left: 0;">';
            allExperiences.forEach(exp => {
                experiencesHtml += `<li style="margin-bottom: 15px;">
                                        <h3 style="margin-bottom: 5px; font-size: 1.1em;">${exp.entreprise}</h3>
                                        <p style="margin: 0 0 5px 0; font-style: italic;">${exp.poste} - ${exp.periode}</p>
                                        <p style="margin: 0;">${highlightTech(exp.description)}</p>
                                    </li>`;
            });
            experiencesHtml += '</ul>';
        } else {
            experiencesHtml += '<p>Aucune expérience à afficher.</p>';
        }

        let competencesHtml = '<h2>Compétences</h2>';
        if (allSkillsData && allSkillsData.length > 0) {
            competencesHtml += '<ul style="list-style-type: disc; padding-left: 20px;">';
            allSkillsData.forEach(skill => {
                competencesHtml += `<li>${skill.nom}</li>`;
            });
            competencesHtml += '</ul>';
        } else {
            competencesHtml += '<p>Aucune compétence à afficher.</p>';
        }

        const contentHtml = `
            <div style="font-family: Arial, sans-serif; color: #333; padding: 20px;">
                <div style="text-align: center; margin-bottom: 20px;">
                    <h1 style="margin: 0; font-size: 1.8em;">${nomPrenom}</h1>
                    <p style="margin: 5px 0 15px 0; font-size: 1.2em;">${titre}</p>
                </div>
                <div style="margin-bottom: 20px; padding: 10px; border: 1px solid #eee; background-color: #f9f9f9;">
                    <h3 style="margin-top:0; margin-bottom: 8px; font-size: 1em;">Informations de contact</h3>
                    <p style="margin: 3px 0;"><strong>LinkedIn:</strong> <a href="${linkedinUrl}">${linkedinUrl}</a></p>
                    <p style="margin: 3px 0;"><strong>Téléphone:</strong> ${telephone}</p>
                    <p style="margin: 3px 0;"><strong>Permis:</strong> ${permis}</p>
                </div>
                
                <div style="margin-bottom: 20px;">
                    ${experiencesHtml}
                </div>
                
                <div>
                    ${competencesHtml}
                </div>
            </div>
        `;

        const element = document.createElement('div');
        element.innerHTML = contentHtml;

        const opt = {
            margin:       [10, 10, 10, 10], // marges en mm [haut, gauche, bas, droite]
            filename:     'CV_Benoit_CHOCOT.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2, useCORS: true, logging: true }, // Améliore la qualité de l'image
            jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };

        // Pour éviter que le contenu soit coupé entre les pages de manière abrupte
        html2pdf().set(opt).from(element).toPdf().get('pdf').then(function (pdf) {
            var totalPages = pdf.internal.getNumberOfPages();
            for (var i = 1; i <= totalPages; i++) {
                pdf.setPage(i);
                pdf.setFontSize(10);
                pdf.setTextColor(150);
                pdf.text('Page ' + i + ' sur ' + totalPages, pdf.internal.pageSize.getWidth() - 30, pdf.internal.pageSize.getHeight() - 5);
            }
        }).save();
    }

    // Attacher l'événement au bouton si l'admin est connecté
    if (isAdmin()) {
        const downloadButton = document.getElementById('download-pdf-btn');
        if (downloadButton) {
            downloadButton.addEventListener('click', generatePdf);
        }
    }
</script>
	</body>
</html>
<style>
#skills-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

/* Empêche le débordement du tableau */
#skills-table-wrapper {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    width: 100%;
}

#skills-table td {
    color: grey;
    background-color: #f8f9fa; /* Couleur claire pour contraster avec le fond */
    border: 1px solid #ddd; /* Bordure légère pour la séparation */
    padding: 10px;
    text-align: center;
    font-weight: bold;
    min-width: 120px; /* Largeur minimale */
    word-wrap: break-word;
}

#skills-table tr:nth-child(even) td {
    background-color: #e9ecef; /* Alternance des couleurs pour plus de lisibilité */
}

#skills-table td button {
    margin-left: 8px;
    background: none;
    border: none;
    cursor: pointer;
    font-size: 12px;
}

#skills-table td button:hover {
    color: red; /* Changement de couleur au survol */
}
</style>
