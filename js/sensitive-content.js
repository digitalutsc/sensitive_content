const blockedClasses = drupalSettings.sensitive_content_checker.blockedClasses;
const titleText = drupalSettings.sensitive_content_checker.title;
const descriptionText = drupalSettings.sensitive_content_checker.description;
const buttonText = drupalSettings.sensitive_content_checker.buttonText;

// If there are no blocked classes, exit early
if (!blockedClasses) {
  console.log('No classes to block.');
}

// Split the classes by comma (assuming they are entered as comma-separated values)
const classesToBlock = blockedClasses.split(',').map(className => className.trim());

// Loop through each class and find elements to block
classesToBlock.forEach(className => {
  const elements = document.querySelectorAll(className);
  
  elements.forEach(el => {

    const overlay = document.createElement('div');
    const container = document.createElement('div');

    overlay.classList.add('sensitive-overlay');
    container.classList.add('sensitive-container');

    const title = document.createElement('h1');
    const description = document.createElement('p');
    const button = document.createElement('button');

    title.innerHTML = titleText;
    description.innerHTML = descriptionText;
    button.innerHTML = buttonText;

    container.appendChild(title);
    container.appendChild(description);
    container.appendChild(button);

    overlay.appendChild(container);

    button.addEventListener('click', function () {
      overlay.style.display = 'none';
    });

    el.appendChild(overlay);
  });
});
