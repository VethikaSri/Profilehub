document.getElementById("add-skill").addEventListener("click", function(event) {
    event.preventDefault();
    const skillContainer = document.getElementById("skill-container");
    const newSkill = document.createElement("div");
    newSkill.classList.add("form-group", "mt-2");
    newSkill.innerHTML = `
        <input type="text" class="form-control" name="skill[]" placeholder="Enter Another Skill">
        <input type="number" class="form-control mt-2" name="skill_percentage[]" placeholder="Skill Percentage (0-100)" min="0" max="100">
    `;
    skillContainer.appendChild(newSkill);
});

document.getElementById("add-project").addEventListener("click", function(event) {
    event.preventDefault();
    const projectContainer = document.getElementById("project-container");
    const newProject = document.createElement("div");
    newProject.classList.add("form-group", "mt-2");
    newProject.innerHTML = '<input type="text" class="form-control" placeholder="Enter Another Project">';
    projectContainer.appendChild(newProject);
});