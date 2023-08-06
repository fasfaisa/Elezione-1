const ctx = document.getElementById("votes");
const voteCountSelect = document.getElementById("type-vote-count");
const newCampaignForm = document.getElementById("new-campaign-form");
const sdate = document.getElementById("sdate");
const edate = document.getElementById("edate");

document.getElementById("type-vote-count").addEventListener("change", () => {
  location.reload();
});
document.getElementById("new-campaign").addEventListener("click", () => {
  newCampaignForm.classList.remove("scale-0");
  newCampaignForm.classList.add("scale-1");
});
document.getElementById("new-campaign-close").addEventListener("click", () => {
  newCampaignForm.classList.remove("scale-1");
  newCampaignForm.classList.add("scale-0");
});

// current date getting function
sdate.setAttribute("value", new Date().toISOString().slice(0, -8));
sdate.setAttribute("min", new Date().toISOString().slice(0, -8));
edate.setAttribute("value", new Date().toISOString().slice(0, -8));
edate.setAttribute("min", new Date().toISOString().slice(0, -8));

// graph object
new Chart(ctx, {
  type: voteCountSelect.value,
  data: {
    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
    datasets: [
      {
        label: "Number of Votes",
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      y: {
        beginAtZero: true,
      },
    },
  },
});
