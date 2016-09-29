CREATE TABLE Designation(
	Designation_ID VARCHAR(3) PRIMARY KEY,
	Title VARCHAR(35) NOT NULL
);

CREATE TABLE Department(
	Department_ID VARCHAR(5) PRIMARY KEY,
	Department_Name VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE StaffDetails(
	Google_UID CHAR(21) PRIMARY KEY,
  Email VARCHAR(320) NOT NULL CHECK (Email LIKE '%@ves.ac.in'),
  FirstName VARCHAR(35) NOT NULL,
  LastName VARCHAR(35),
  Designation_ID VARCHAR(3) NOT NULL REFERENCES Designation(Designation_ID),
  DateOfJoin DATE,
  Contact VARCHAR(10) CHECK (Contact LIKE '[0-9]'),
  Department_ID VARCHAR(5) REFERENCES Department(Department_ID),
);

CREATE TABLE LeavesAllotted(
	Designation_ID VARCHAR(3) REFERENCES Designation(Designation_ID),
	SickLeave INT,
	CasualLeave INT,
	Vacation INT,
	EarlyGo INT,
	EarnedLeave INT,
);

CREATE TABLE LeaveHistory(
	AppliedBy VARCHAR(21) REFERENCES StaffDetails(Google_UID),
	AppliedTo VARCHAR(21) REFERENCES StaffDetails(Google_UID),
	FromDate Date, ToDate DATE,
	LeaveType VARCHAR(20),
	Note VARCHAR(300),
	`Status` VARCHAR(10) CHECK (`Status` IN ('APPROVED','REJECTED','PENDING')) DEFAULT 'PENDING',
	PRIMARY KEY(AppliedBy, AppliedTo, FromDate, ToDate, LeaveType),
);

CREATE TABLE Authority(
	Google_UID CHAR(21) REFERENCES StaffDetails(Google_UID),
	Title VARCHAR(20) NOT NULL,
	Department_ID VARCHAR(10) REFERENCES Department(Department_ID),
);

/*ALTER TABLE StaffDetails ADD FOREIGN KEY(Designation_ID) REFERENCES Designation(Designation_ID)
ALTER TABLE StaffDetails ADD CHECK (Contact LIKE '[0-9]')*/

CREATE TABLE LeavesLeft(
	Google_UID CHAR(21) PRIMARY KEY REFERENCES StaffDetails(Google_UID),
	`Sick Leave` INT CHECK(`Sick Leave`>=0),
	`Casual Leave` INT CHECK(`Casual Leave`>=0),
	`Vacation` INT CHECK(`Vacation`>=0),
	`Early Go` INT CHECK(`Early Go`>=0),
	`Earned Leave` INT CHECK(`Earned Leave`>=0)
);

CREATE TABLE Variable(
  Name varchar(30),
  Val varchar(30)
  );

INSERT INTO Variable VALUES
  ('TermStart',NULL),
  ('TermEnd',NULL);
