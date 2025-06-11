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
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<span class="logo"><img src="images/logo.svg" alt="" /></span>
						<h1>Curriculum Vitae -  Benoit CHOCOT</h1>
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
											<div> ou <a href="https://www.linkedin.com/in/benoit-chocot/">mon LinkedIn</a></div>
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
document.addEventListener("DOMContentLoaded", loadSkills);

function loadSkills() {
    fetch("api_skills.php")
        .then(res => res.json())
        .then(data => {
            let tableBody = document.getElementById("skills-table").getElementsByTagName("tbody")[0];
            tableBody.innerHTML = ""; // Reset du tableau

            let row;
            data.forEach((skill, index) => {
                if (index % 5 === 0) {
                    row = document.createElement("tr");
                    tableBody.appendChild(row);
                }

                let cell = document.createElement("td");
                cell.textContent = skill.nom;
                row.appendChild(cell);

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

    let method = id ? "PUT" : "POST";
    let data = id ? { id: id, nom: name } : { nom: name };

    fetch("api_skills.php", {
        method: method,
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
    }).then(() => {
        loadSkills();
        document.getElementById("skill-form").style.display = "none";
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
    }).then(() => loadSkills());
}

function isAdmin() {
    return <?php echo json_encode(isAdmin()); ?>;
}
</script>

<script>
document.addEventListener("DOMContentLoaded", loadExperiences);
function loadExperiences() {
    fetch("api.php")
        .then(res => res.json())
        .then(data => {
            let list = document.getElementById("experience-list");
            list.innerHTML = "";
            data.forEach(exp => {
                let entreprise = encodeURIComponent(exp.entreprise);
                let poste = encodeURIComponent(exp.poste);
                let periode = encodeURIComponent(exp.periode);
                let description = encodeURIComponent(exp.description);

                let adminButtons = `<?php if (isAdmin()) { ?>
                    <button onclick="showEditForm(${exp.id}, '${entreprise}', '${poste}', '${periode}', '${description}')">Modifier</button>
                    <button onclick="deleteExperience(${exp.id})">Supprimer</button>
                <?php } ?>`;

                list.innerHTML += `
                    <li>
                        <h3>${exp.entreprise}</h3>
                        <h4>${exp.poste} - ${exp.periode}</h4>
                        <p>${exp.description}</p>
                        ${adminButtons}
                    </li>
                `;
            });
        });
}
function showEditForm(id, entreprise, poste, periode, description) {
    entreprise = decodeURIComponent(entreprise);
    poste = decodeURIComponent(poste);
    periode = decodeURIComponent(periode);
    description = decodeURIComponent(description);

    console.log("Modifier l'expérience ID:", id, entreprise, poste, periode, description);
    
    document.getElementById("edit-id").value = id;
    document.getElementById("edit-entreprise").value = entreprise;
    document.getElementById("edit-poste").value = poste;
    document.getElementById("edit-periode").value = periode;
    document.getElementById("edit-description").value = description;
    document.getElementById("edit-form").style.display = "block";
}



function showAddForm() {
    document.getElementById("add-form").style.display = "block";
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
    }).then(() => {
        loadExperiences();
        document.getElementById("edit-form").style.display = "none";
    });
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
    }).then(() => {
        loadExperiences();
        document.getElementById("add-form").style.display = "none";
    });
}

function deleteExperience(id) {
    fetch("api.php", {
        method: "DELETE",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id: id })
    }).then(() => loadExperiences());
}
</script>
<script>
document.addEventListener("DOMContentLoaded", loadDescriptions);

function loadDescriptions() {
    fetch("api_descriptions.php")
        .then(res => res.json())
        .then(data => {
            let list = document.getElementById("description-list");
            list.innerHTML = "";
            data.forEach(desc => {
                list.innerHTML += `
                    <div>
                        <h3>${desc.entreprise}</h3>
                        <p id="desc-text-${desc.id}">${desc.contenu}</p>
    <?php if (isAdmin()): ?>
                            <button onclick="editDescription(${desc.id})">Modifier</button>
                            <button onclick="deleteDescription(${desc.id})">Supprimer</button>
                            <div id="edit-desc-${desc.id}" style="display:none;">
                                <textarea id="edit-content-${desc.id}">${desc.contenu}</textarea>
                                <button onclick="updateDescription(${desc.id})">Sauvegarder</button>
                            </div>
                        <?php endif; ?>
                    </div>
                `;
            });
        })
        .catch(error => console.error("Erreur de chargement des descriptions :", error));
}

function showDescriptionForm() {
    document.getElementById("description-form").style.display = "block";
}

function addDescription() {
    let data = {
        entreprise: document.getElementById("desc-entreprise").value,
        contenu: document.getElementById("desc-contenu").value
    };

    fetch("api_descriptions.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
    }).then(() => {
        loadDescriptions();
        document.getElementById("description-form").style.display = "none";
    });
}

function editDescription(id) {
    document.getElementById(`edit-desc-${id}`).style.display = "block";
}

function updateDescription(id) {
    let updatedContent = document.getElementById(`edit-content-${id}`).value;

    fetch("api_descriptions.php", {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id: id, contenu: updatedContent })
    }).then(() => loadDescriptions());
}

function deleteDescription(id) {
    fetch("api_descriptions.php", {
        method: "DELETE",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ id: id })
    }).then(() => loadDescriptions());
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
