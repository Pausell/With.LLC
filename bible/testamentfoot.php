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
tableOfContents.innerHTML = `
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
    <path fill="none" d="M0 0h24v24H0z"/>
    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/>
  </svg>
`;

tableOfContents.addEventListener('click', () => {
  liSections.forEach((liSection) => {
    const checkbox = liSection.querySelector('input[type="checkbox"]');
    const li = checkbox.closest('li');
    if (!checkbox.checked && !li.classList.contains('initially-checked')) {
      li.style.display = li.style.display === 'none' ? '' : 'none';
    }
  });

  // Toggle the active class for the "Table of Contents" anchor
  tableOfContents.classList.toggle('active');
});

document.querySelector('.igation').appendChild(tableOfContents);

// Get the current page URL
const currentURL = window.location.href.toLowerCase();

// Check if the URL contains ot.php or nt.php and toggle visibility accordingly
if (currentURL.includes('ot.php') || currentURL.includes('nt.php')) {
  collections.forEach((collection) => {
    const lis = collection.querySelectorAll('li');
    lis.forEach((li) => {
      if (!li.querySelector('input[type="checkbox"]').checked) {
        li.style.display = 'none';
      }
    });

    const allHidden = Array.from(lis).every((li) => li.style.display === 'none');
    if (allHidden) {
      collection.classList.add('hidden');
      tableOfContents.classList.remove('active');
    } else {
      collection.classList.remove('hidden');
      tableOfContents.classList.add('active');
    }
  });
}
</script>