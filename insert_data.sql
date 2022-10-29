

INSERT INTO Account (username, password)
VALUES ('test', '$password');

INSERT INTO CustomerDetails (accountId, fullName, email, phoneNumber, dateOfBirth, address)
VALUES ( (SELECT accountId from Account where username = 'test'), 'test', 'test@gmail.com', '83066382', '2000-08-01', '');