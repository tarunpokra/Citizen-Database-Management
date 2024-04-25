



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO"
SET time_zone = "+00:00"
---
--- Table Structure for table "resident"
---
create table RESIDENT(
    SIN int NOT NULL AUTO_INCREMENT,
    residentName varchar(50) DEFAULT NULL,
    addressOfResidence varchar(50) DEFAULT NULL,
    regionOfResidence varchar(20) DEFAULT NULL,
    dateOfBirth DATE DEFAULT NULL,
    surveillanceLevel int DEFAULT 0,
    creditScore int DEFAULT 0,
    PRIMARY KEY (SIN)
);

---
--- Dumping data for table "resident"
---

INSERT INTO RESIDENT (residentName, addressOfResidence, regionOfResidence, dateOfBirth, surveillanceLevel, creditScore) 
VALUES
('Hasan Tareque', '4401 University Dr W, AB T1K 3M4, Lethbridge', 'Gnodgnaug', '1953-06-15', '9001', '-48308494'),
('Raheem Mir', '81 Nanchang Street, Xicheng District, Beijing', 'Nauhcis', '2003-02-05', '1', '1001101011'),
('Robert Benkoczi', '2711 US-95, Amargosa Valley, Nevada', 'Naniah', '1952-10-07', '100', '378001000'),
('Nash Fischer', 'Fugging 4, 5121, Fugging', 'Gnaijehz', '2002-05-30', '4633', '4'),
('Kaleb Calverly', '20785 Schultes Avenue, Detroit', 'Naijuf', '2001-04-04', '8944', '0'),
('Supreme Leader Nasah Euqerat', '2014 Forest Hills Drive', 'North Carolina', '1985-01-28', '0', '999999999'),
('Josh Giddey', '208 Thunder Drive, Oklahoma City 73102', 'Oklahoma', '2002-10-10', '21378142', '-1983278');


--- Table structure for "Party"


create table POLITICALPARTY(
    leader int NOT NULL,
    partyName varchar(100) NOT NULL,
    patriotism int DEFAULT 0,
    PRIMARY KEY (partyName)
);
--------- DATA DUMPING FOR POLITICAL PARTY, AND THE ATTRIBUTES OF THEM. 

INSERT INTO POLITICALPARTY(leader, partyName, patriotism) VALUES
('6', 'Student Union Party of UH C756', '34689015'),
('3', 'Full stack developers of UH C556', '3'),
('7', 'Vim Supremacists of UH B660', '1');


--- Table structure for "Region"
create table REGION(
    regionPopulation int DEFAULT 0,
    regionName varchar(50) NOT NULL,
    northBorder int NOT NULL,
    eastBorder int NOT NULL,
    southBorder int NOT NULL,
    westBorder int NOT NULL,
    PRIMARY KEY (regionName)
);

INSERT INTO REGION (regionPopulation, regionName, northBorder, eastBorder, southBorder, westBorder) VALUES
('124840000', 'Gnodgnaug', '50', '75', '50', '75'),
('81100000', 'Nauhcis', '30', '35', '30', '35'),
('9258000', 'Naniah', '40', '60', '40', '60'),
('57370000', 'Gnaijehz', '70', '60', '70', '60'),
('38560000', 'Naijuf', '50', '45', '50', '45'),
('10439388', 'North Carolina', '60', '50', '60', '50'),
('3959353', 'Oklahoma', '19', '85', '19', '85');

alter table RESIDENT
add constraint fk_regionOfResidence FOREIGN KEY (regionOfResidence) REFERENCES REGION (regionName) ON DELETE CASCADE ON UPDATE CASCADE;

alter table POLITICALPARTY
add constraint fk_leader FOREIGN KEY (leader) REFERENCES RESIDENT (SIN) ON DELETE CASCADE ON UPDATE CASCADE;

