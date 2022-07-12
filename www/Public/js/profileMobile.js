
const arrow = document.querySelector(".arrow");
const infoChoice = document.querySelector("#infoChoice");
const paramChoice = document.querySelector("#paramChoice");

const profile = document.querySelector(".profile");
const listParameters = document.querySelector(".list-parameters");
const parameters = document.querySelector(".parameters");

const linkNotification = document.querySelector(".link-notification");
const notifications = document.querySelector(".notifications");
const notificationTitle = document.querySelector(".notification-title");
const img = document.querySelector(".img");

const linkLanguage = document.querySelector(".link-language");
const language = document.querySelector(".language");
const languageTitle = document.querySelector(".language-title");

const LinkSiteManagement = document.querySelector(".link-site-management");
const siteManagement = document.querySelector(".site-management");
const siteManagementTitle = document.querySelector(".site-management-title");

const linkSecurity = document.querySelector(".link-security");
const security = document.querySelector(".security");
const securityTitle = document.querySelector(".security-title");

const linkMessageCenter = document.querySelector(".link-message-center");
const messageCenter = document.querySelector(".message-center");
const messageCenterTitle = document.querySelector(".message-center-title");

const linkCGU = document.querySelector(".link-CGU");
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



infoChoice.addEventListener("click", (e) => {
    infoChoice.className = "choice-active"
    paramChoice.className = ""
    profile.style.display = ""
    listParameters.style.display = "none"
});

paramChoice.addEventListener("click", (e) => {
    infoChoice.className = ""
    paramChoice.className = "choice-active"
    profile.style.display = "none"
    listParameters.style.display = ""
    parameters.style.display = "flex"
});

linkNotification.addEventListener("click", (e) => {
    paramChoice.style.display = "none"
    infoChoice.style.display = "none"
    parameters.style.display = "none"
    notifications.style.display = "flex"
    notificationTitle.style.display = "flex"
    img.style.display = "none"
    arrow.style.display = ""

});

notificationTitle.addEventListener("click", (e) => {
    paramChoice.style.display = ""
    infoChoice.style.display = ""
    parameters.style.display = "flex"
    notifications.style.display = "none"
    notificationTitle.style.display = "none"
    img.style.display = ""
    arrow.style.display = "none"
})

linkLanguage.addEventListener("click", (e) => {
    paramChoice.style.display = "none"
    infoChoice.style.display = "none"
    parameters.style.display = "none"
    language.style.display = "flex"
    languageTitle.style.display = "flex"
    img.style.display = "none"
});

languageTitle.addEventListener("click", (e) => {
    paramChoice.style.display = ""
    infoChoice.style.display = ""
    parameters.style.display = "flex"
    language.style.display = "none"
    languageTitle.style.display = "none"
    img.style.display = ""
})

LinkSiteManagement.addEventListener("click", (e) => {
    paramChoice.style.display = "none"
    infoChoice.style.display = "none"
    parameters.style.display = "none"
    siteManagement.style.display = "flex"
    siteManagementTitle.style.display = "flex"
    img.style.display = "none"
});

siteManagementTitle.addEventListener("click", (e) => {
    paramChoice.style.display = ""
    infoChoice.style.display = ""
    parameters.style.display = "flex"
    siteManagement.style.display = "none"
    siteManagementTitle.style.display = "none"
    img.style.display = ""
})
linkSecurity.addEventListener("click", (e) => {
    paramChoice.style.display = "none"
    infoChoice.style.display = "none"
    parameters.style.display = "none"
    security.style.display = "flex"
    securityTitle.style.display = "flex"
    img.style.display = "none"
});

securityTitle.addEventListener("click", (e) => {
    paramChoice.style.display = ""
    infoChoice.style.display = ""
    parameters.style.display = "flex"
    security.style.display = "none"
    securityTitle.style.display = "none"
    img.style.display = ""
})

linkMessageCenter.addEventListener("click", (e) => {
    paramChoice.style.display = "none"
    infoChoice.style.display = "none"
    parameters.style.display = "none"
    messageCenter.style.display = "flex"
    messageCenterTitle.style.display = "flex"
    img.style.display = "none"
});

messageCenterTitle.addEventListener("click", (e) => {
    paramChoice.style.display = ""
    infoChoice.style.display = ""
    parameters.style.display = "flex"
    messageCenter.style.display = "none"
    messageCenterTitle.style.display = "none"
    img.style.display = ""
})

linkCGU.addEventListener("click", (e) => {
    paramChoice.style.display = "none"
    infoChoice.style.display = "none"
    parameters.style.display = "none"
    CGU.style.display = "flex"
    CGUTitle.style.display = "flex"
    img.style.display = "none"
});

CGUTitle.addEventListener("click", (e) => {
    paramChoice.style.display = ""
    infoChoice.style.display = ""
    parameters.style.display = "flex"
    CGU.style.display = "none"
    CGUTitle.style.display = "none"
    img.style.display = ""
})