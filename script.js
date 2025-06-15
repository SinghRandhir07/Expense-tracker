document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("expenseForm");
    form.addEventListener("submit", function(e) {
        const title = form["title"].value.trim();
        const amount = form["amount"].value;
        const category = form["category"].value;
        if (!title || amount <= 0 || !category) {
            alert("Please fill in all fields correctly.");
            e.preventDefault();
        }
    });
});
