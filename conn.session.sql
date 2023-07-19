CREATE TABLE IF NOT EXISTS prescribed;
INSERT INTO company (
    Company_ID,
    Company_Name,
    Company_Email,
    Company_Phone,
    Password
  )
VALUES (
    Company_ID:int,
    'Company_Name:varchar',
    'Company_Email:varchar',
    Company_Phone:int,
    'Password:varchar'
  );

ALTER TABLE company 