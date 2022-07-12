const titleProfile = document.querySelector(".title-profile");
const profile = document.querySelector(".profile");

const notifications = document.querySelector(".notifications");
const notificationTitle = document.querySelector(".notification-title");

const language = document.querySelector(".language");
const languageTitle = document.querySelector(".language-title");

const siteManagement = document.querySelector(".site-management");
const siteManagementTitle = document.querySelector(".site-management-title");

const security = document.querySelector(".security");
const securityTitle = document.querySelector(".security-title");

const messageCenter = document.querySelector(".message-center");
const messageCenterTitle = document.querySelector(".message-center-title");

const CGU = document.querySelector(".CGU");
const CGUTitle = document.querySelector(".CGU-title");

const dataUser = [
    { key: "Nom", value: "Deslys" },
    { key: "Prénom", value: "Luc" },
    { key: "Age", value: "38" },
    { key: "Genre", value: "Masculin" },
    { key: "Email", value: "lucdeslys" },
    { key: "Téléphone", value: "06 05 04 03 02" },
    { key: "Localisation", value: "Avignon" },
    { key: "Site", value: "ldeslys.fr" },
    { key: "Bio", value: "Co-founder and CEO of Chillhouse, the authority in modern self-care. Hang, shop, read." },
]


for (const user of dataUser) {

    let divLign = document.createElement("div")
    let divKey = document.createElement("div")
    let divValue = document.createElement("div")
    divKey.className = "profile-key"
    divValue.className = "profile-value"

    divKey.append(user.key)
    divValue.append(user.value)


    divLign.append(divKey, divValue)

    divLign.className = "profile-details"

    profile.append(divLign)
}


titleProfile.addEventListener("click", (e) => {
    profile.style.display = window.getComputedStyle(profile).display == "none" ? "flex" : "none";
})




notificationTitle.addEventListener("click", (e) => {
    notifications.style.display = window.getComputedStyle(notifications).display == "none" ? "flex" : "none";

})


languageTitle.addEventListener("click", (e) => {
    language.style.display = window.getComputedStyle(language).display == "none" ? "flex" : "none";

})


siteManagementTitle.addEventListener("click", (e) => {
    siteManagement.style.display = window.getComputedStyle(siteManagement).display == "none" ? "flex" : "none";

})


securityTitle.addEventListener("click", (e) => {
    security.style.display = window.getComputedStyle(security).display == "none" ? "flex" : "none";

})


messageCenterTitle.addEventListener("click", (e) => {
    messageCenter.style.display = window.getComputedStyle(messageCenter).display == "none" ? "flex" : "none";

})

CGUTitle.addEventListener("click", (e) => {
    CGU.style.display = window.getComputedStyle(CGU).display == "none" ? "flex" : "none";

})