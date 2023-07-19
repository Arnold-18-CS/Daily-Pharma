-- Drug: Citalopram, Pharmacy: XYZ Pharmacy
INSERT INTO drug_prices (Drug_ID, Pharmacy_ID, Drug_Price)
VALUES
  ((SELECT Drug_ID FROM drugs WHERE Drug_Name = 'Citalopram'), (SELECT Pharmacy_ID FROM pharmacy WHERE Pharmacy_Name = 'XYZ Pharmacy'), 30.00);