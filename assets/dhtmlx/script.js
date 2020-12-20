
const diagram = new dhx.Diagram("diagram_container", {
  type: "org",
  defaultShapeType: "img-card",
  scale: 0.9
});
diagram.data.load('http://localhost/pmii_bondowoso/assets/dhtmlx/data.json');

//     const template = ({ photo, name, post, phone, mail }) => (
//     <div class="dhx-diagram-demo_personal-card">
//       <div class="dhx-diagram-demo_personal-card__container dhx-diagram-demo_personal-card__img-container">
//              <img src="${photo}" alt="${name}-${post}"></img>
//       </div>
//       <div class="dhx-diagram-demo_personal-card__container">
//             <h3>${name}</h3>
//             <p>${post}</p>
//             <span class="dhx-diagram-demo_personal-card__info">
//                 <i class="mdi mdi-cellphone-android"></i>
//                 <p>${phone}</p>
//             </span>
//             <span class="dhx-diagram-demo_personal-card__info">
//                 <i class="mdi mdi-email-outline"></i>
//                 <a href="mailto:${mail}" target="_blank">${mail}</a>
//             </span>
//       </div>
//     </div>
//   );
