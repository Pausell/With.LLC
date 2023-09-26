<script>
// Hide/Display According to Selection

// Step 1: Hide unchecked li with input type="checkbox" on page load
const liSections = document.querySelectorAll('li section');
liSections.forEach((liSection) => {
  const checkbox = liSection.querySelector('input[type="checkbox"]');
  const li = checkbox.closest('li');
  if (!checkbox.checked) {
    li.style.display = 'none';
  } else {
    li.classList.add('initially-checked');
  }
});

// Step 2: Add "Table of Contents" anchor to .igation to toggle visibility of initially hidden li
const tableOfContents = document.createElement('a');
tableOfContents.href = '#';
tableOfContents.innerHTML = `<svg width="100%" class="white" width="260" height="261" viewBox="0 0 260 261" fill="none" xmlns="http://www.w3.org/2000/svg">
  <g clip-path="url(#clip0_702_524)">
    <rect width="260" height="260" transform="translate(0 1.55469)" fill="#13003C"/>
    <rect width="260" height="260" transform="translate(0 1.55469)" fill="url(#paint0_linear_702_524)" fill-opacity="0.2"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M180 57H80V107H30V207H34.1279V111.128H80V157H84.1279V111.128H125.871V207H130H134.128V111.128H175.871V157H180V111.128H225.871V207H230V107H180V57ZM84.1279 107H130H175.871V61.1284H84.1279V107Z" fill="#FF0000"/>
  </g>
  <defs>
    <linearGradient id="paint0_linear_702_524" x1="130" y1="0" x2="130" y2="260" gradientUnits="userSpaceOnUse">
      <stop stop-color="white" stop-opacity="0.75"/>
      <stop offset="1" stop-color="white" stop-opacity="0"/>
    </linearGradient>
    <clipPath id="clip0_702_524">
      <rect y="0.710938" width="260" height="260" rx="57.54" fill="white"/>
    </clipPath>
  </defs>
</svg>`;

// Function to toggle the active class for the "Table of Contents" anchor
function toggleTableOfContentsActive() {
  liSections.forEach((liSection) => {
    const checkbox = liSection.querySelector('input[type="checkbox"]');
    const li = checkbox.closest('li');
    if (!checkbox.checked && !li.classList.contains('initially-checked')) {
      li.style.display = li.style.display === 'none' ? '' : 'none';
    }
  });

  // Toggle the active class for the "Table of Contents" anchor
  tableOfContents.classList.toggle('active');
}

tableOfContents.addEventListener('click', () => {
  toggleTableOfContentsActive();
});

document.querySelector('.igation').appendChild(tableOfContents);

// get all collections
const collections = document.querySelectorAll('.collection');

// loop through each collection
collections.forEach(collection => {
  const lis = collection.querySelectorAll('li');

  // check if all li are hidden
  const allHidden = Array.from(lis).every(li => li.style.display === 'none');

  if (allHidden) {
    // if all li are hidden, hide the collection
    collection.classList.add('hidden');
  } else {
    // if any li are visible, show the collection
    collection.classList.remove('hidden');
  }

  // add a MutationObserver to each collection to check for changes in li visibility
  const observer = new MutationObserver(() => {
    const allHidden = Array.from(lis).every(li => li.style.display === 'none');

    if (allHidden) {
      collection.classList.add('hidden');
      toggleTableOfContentsActive(); // Toggle active class when changes occur
    } else {
      collection.classList.remove('hidden');
      toggleTableOfContentsActive(); // Toggle active class when changes occur
    }
  });

  // observe changes to each li element
  lis.forEach(li => {
    observer.observe(li, { attributes: true, attributeFilter: ['style'] });
  });
});
</script>
