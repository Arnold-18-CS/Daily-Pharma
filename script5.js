const select = document.getElementById('availableDrugs');
const drugInfo = document.getElementById('drugInfo');
const drugName = document.getElementById('drugName');
const drugPrice = document.getElementById('drugPrice');

select.addEventListener('change', function() {
  const selectedOption = select.options[select.selectedIndex];
  const optionValue = selectedOption.value;
  const optionText = selectedOption.text;

  // Set the drug name and description in the drugInfo div
  drugName.textContent = ` Drug Name -  ${optionValue}`;
  drugPrice.textContent = `Drug Price - ${optionValue}`;

  // Show the drugInfo div
  drugInfo.style.display = 'block';
});
