CREATE TABLE Blocks(
	Blockname VARCHAR(5) NOT NULL, 
	CONSTRAINT BLOCKPK PRIMARY KEY(Blockname)
);

CREATE TABLE RoomAllotment(
	
	Room_no INT NOT NULL,
	Block VARCHAR(20) NOT NULL,
	No_of_occupants INT,
	Capacity INT,
	CONSTRAINT ROOMPK PRIMARY KEY(Room_no),
	CONSTRAINT BLOCKFK FOREIGN KEY(Block) references Blocks(Blockname) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE  Mess(
	Mname VARCHAR(20),
	CONSTRAINT MESSPK PRIMARY KEY(Mname)
);

CREATE TABLE Department(
	Dname VARCHAR(25) NOT NULL,
	D_id INT NOT NULL,
	CONSTRAINT DEPTPK PRIMARY KEY(Dname)
);

CREATE TABLE Student(
	Reg_no INT NOT NULL,
	Firstname  VARCHAR(30) NOT NULL,
	Lastname  VARCHAR(30) NOT NULL,
	SRN VARCHAR(30) NOT NULL,
	Smobile1 bigINT NOT NULL,
	Smobile2 bigINT,
	DOB DATE ,
	Email VARCHAR(30) NOT NULL UNIQUE,
	Address VARCHAR(30) NOT NULL,
	City VARCHAR(15) NOT NULL,
	State VARCHAR(15) NOT NULL,
	Pincode INT NOT NULL,
	Year INT NOT NULL,
	Dname VARCHAR(20) NOT NULl,
	Block VARCHAR(20),
	Room_no INT,
	Mname VARCHAR(15),
	PWORD VARCHAR(20) NOT NULL,
	Allot INT DEFAULT 0,
	CONSTRAINT STUPK  PRIMARY KEY(Reg_no),
	CONSTRAINT STUBLOCKFK FOREIGN KEY(Block) references Blocks(Blockname) 
	ON UPDATE CASCADE 
	ON DELETE SET NULL,
	CONSTRAINT STUROOMFK FOREIGN KEY(Room_no) references RoomAllotment(Room_no) 
	ON UPDATE CASCADE 
	ON DELETE SET NULL,
	CONSTRAINT STUMESSFK FOREIGN KEY(Mname) references Mess(Mname) ON UPDATE CASCADE ON DELETE SET NULL,
	CONSTRAINT STUDEPTFK FOREIGN KEY(Dname) references Department(Dname) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE Parent(
	Reg_no INT, 
	Pname VARCHAR(30) NOT NULL,
	Pmobile1 bigINT NOT NULL,
	Pmobile2 bigINT,
	Address VARCHAR(30) NOT NULL,
	PRIMARY KEY(Reg_no),
	CONSTRAINT PARTFK FOREIGN KEY(Reg_no) references Student(Reg_no) ON DELETE CASCADE
);

CREATE TABLE LG(
	Reg_no INT,
	Lname VARCHAR(30) NOT NULL,
	Lmobile1 bigINT NOT NULL,
	Lmobile2 bigINT,
	Laddress VARCHAR(30) NOT NULL,
	PRIMARY KEY(Reg_no),
	CONSTRAINT LGFK FOREIGN KEY(Reg_no) references Student(Reg_no) ON DELETE CASCADE
);


CREATE TABLE Warden(
	W_id INT NOT NULL,
	Wname VARCHAR(25) NOT NULL,
	Email VARCHAR(30) NOT NULL UNIQUE,
	Wmobile1 bigINT NOT NULL,
	Wmobile2 bigINT NOT NULL,
	WPWORD VARCHAR(10) NOT NULL,
	PRIMARY KEY(W_id)
);



CREATE TABLE Leave_application(
	Reg_no INT NOT NULL,
	W_id INT NOT NULL,
	Check_in DATE NOT NULL,
	Check_out DATE NOT NULL,
	Place VARCHAR(25) NOT NULL,
	CONSTRAINT LEAVEFK FOREIGN KEY(Reg_no) references Student(Reg_no) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT LEAVEWIDFK FOREIGN KEY(W_id) references Warden(W_id) ON UPDATE CASCADE	
);

CREATE TABLE Complaints(
	Reg_no INT NOT NULL,
	W_id INT NOT NULL,
	Subject VARCHAR(100) NOT NULL,
	Complaint VARCHAR(100) NOT NULL,
	CONSTRAINT CMPTFK FOREIGN KEY(Reg_no) references Student(Reg_no) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT CMPTWIDFK FOREIGN KEY(W_id) references Warden(W_id) ON UPDATE CASCADE
);



INSERT INTO Blocks VALUES('NBX');
INSERT INTO Blocks VALUES('NB');
INSERT INTO Blocks VALUES('IH');
INSERT INTO Blocks VALUES('IT');
INSERT INTO Blocks VALUES('MM');
INSERT INTO Blocks VALUES('MB');

INSERT INTO RoomAllotment VALUES(605,'MM',1,2);
INSERT INTO RoomAllotment VALUES(604,'MM',0,2);
INSERT INTO RoomAllotment VALUES(603,'MM',0,2);
INSERT INTO RoomAllotment VALUES(602,'MM',0,2);
INSERT INTO RoomAllotment VALUES(601,'MM',0,2);
INSERT INTO RoomAllotment VALUES(505,'IH',0,1);
INSERT INTO RoomAllotment VALUES(504,'IH',0,1);
INSERT INTO RoomAllotment VALUES(503,'IH',0,1);
INSERT INTO RoomAllotment VALUES(502,'IH',0,1);
INSERT INTO RoomAllotment VALUES(501,'IH',1,1);
INSERT INTO RoomAllotment VALUES(405,'MB',1,2);
INSERT INTO RoomAllotment VALUES(404,'MB',1,2);
INSERT INTO RoomAllotment VALUES(403,'MB',0,2);
INSERT INTO RoomAllotment VALUES(402,'MB',0,2);
INSERT INTO RoomAllotment VALUES(401,'MB',0,2);
INSERT INTO RoomAllotment VALUES(305,'IT',0,6);
INSERT INTO RoomAllotment VALUES(304,'IT',0,4);
INSERT INTO RoomAllotment VALUES(303,'IT',0,3);
INSERT INTO RoomAllotment VALUES(302,'IT',1,3);
INSERT INTO RoomAllotment VALUES(301,'IT',0,3);
INSERT INTO RoomAllotment VALUES(205,'NBX',0,4);
INSERT INTO RoomAllotment VALUES(204,'NBX',0,3);
INSERT INTO RoomAllotment VALUES(203,'NBX',0,3);
INSERT INTO RoomAllotment VALUES(202,'NBX',0,3);
INSERT INTO RoomAllotment VALUES(201,'NBX',1,3);
INSERT INTO RoomAllotment VALUES(105,'NB',0,6);
INSERT INTO RoomAllotment VALUES(104,'NB',0,3);
INSERT INTO RoomAllotment VALUES(103,'NB',0,3);
INSERT INTO RoomAllotment VALUES(102,'NB',0,3);
INSERT INTO RoomAllotment VALUES(101,'NB',2,3);


INSERT INTO Mess VALUES('AMAN RASOI');
INSERT INTO Mess VALUES('FOOD COURT');
INSERT INTO Mess VALUES('HOSTEL MESS');


INSERT INTO Warden VALUES(1,'Nagesh','nageshkj@gmail.com',7589548978,8689594671,'admin@123');
INSERT INTO Warden VALUES(2,'Kishore','admin@gmail.com',9976548978,7689889962,'hello@123');


INSERT INTO Department VALUES('CSE',10);
INSERT INTO Department VALUES('ME',14);
INSERT INTO Department VALUES('ECE',13);
INSERT INTO Department VALUES('CV',15);
INSERT INTO Department VALUES('EEE',11);
INSERT INTO Department VALUES('BT',12);


INSERT INTO Student VALUES(1,'Sanath','Kumar','PES1201701771',8660378506,9482054712,'1999-07-21','sanath21799@gmail.com','Anugraha chintrapalli','H.B.Halli','Karnataka',583212,2017,'CSE','IH',501,'AMAN RASOI','Sanath123',1);
INSERT INTO Student VALUES(2,'Guruprasad','Hadimani','PES1201700980',9663050747,9492051452,'1999-04-23','prasadhadimani1999@gmail.com','Gangadhara Nagar Noolvi','Hubli','Karnataka',580028,2017,'CSE',NULL,NULL,NULL,'Guru1783',0);
INSERT INTO Student VALUES(3,'Rakesh','Devani','PES1201701602',8794523156,8567812712,'1999-04-11','rakeshdj@gmail.com','Mandara nilaya','Gulbarga','Karnataka',580231,2017,'CSE','MM',605,'HOSTEL MESS','Rakibhai654',1);
INSERT INTO Student VALUES(4,'Mahesh','Patil','PES1201701667',7864598306,9002233550,'1999-08-01','patilm@gmail.com','Bagepalli','Chikkaballapura','Karnataka',573002,2017,'ME','NB',101,'FOOD COURT','Mahesha',1);
INSERT INTO Student VALUES(5,'Abhishek','Choukimath','PES1201700194',6362344589,4576854700,'1999-04-12','abhi143@gmail.com','Padaki layout','Hyderabad','Telangana',483812,2017,'ECE','NBX',201,'HOSTEL MESS','Abhi@143',1);
INSERT INTO Student VALUES(6,'Pranav','Badami','PES1201701654',9457645576,8482854782,'1999-05-20','pranavbadami@gmail.com','Yelahanka','Bengaluru','Karnataka',583812,2017,'ECE','NB',101,'AMAN RASOI','badami',1);
INSERT INTO Student VALUES(7,'Monish','Badigera','PES1201701666',8895648506,9482754689,'1999-10-23','mpes@gmail.com','Raman road','Chintamani','Karnataka',583456,2017,'ME','MB',404,'FOOD COURT','12893',1);
INSERT INTO Student VALUES(8,'Adarsh','Chakravarthi','PES1201701875',7894568506,9456783712,'1999-02-05','andeshwar5@gmail.com','Motte','Chitradurga','Karnataka',583214,2017,'EEE','IT',302,'HOSTEL MESS','Anda_beku',1);
INSERT INTO Student VALUES(9,'Chetan','Chavannavar','PES1201701365',7022456789,9482054712,'1999-05-18','chavannavar@gmail.com','Aradhana','Belagavi','Karnataka',583789,2017,'EEE','MB',405,'FOOD COURT','pasta!',1);
INSERT INTO Student VALUES(10,'Suman','Acharya','PES1201701776',7565455864,7023546892,'1999-12-06','sumnacharya@gmail.com','Shanti Nagara','Hassan','Karnataka',573189,2017,'BT',NULL,NULL,NULL,'Some1729',0);

INSERT INTO Parent VALUES(1,'Raghavendra',9480723074,9482054712,'Anugraha chintrapalli');
INSERT INTO Parent VALUES(2,'Mallikarjun',9945090962,8123020506,'Gangadhar Nagar Noolvi');
INSERT INTO Parent VALUES(3,'Ramesh',8480703074,9262051742,'Mandara Nilaya');
INSERT INTO Parent VALUES(4,'Suresh',7489723775,7482054772,'Bagepalli');
INSERT INTO Parent VALUES(5,'Rajashekhar',8480823077,9982054921,'Padaki layout');
INSERT INTO Parent VALUES(6,'Praveen',8578953074,9682054722,'Yelahanka');
INSERT INTO Parent VALUES(7,'Vikas',6306469743,9880054709,'Raman road');
INSERT INTO Parent VALUES(8,'Rajesh',8660756981,9880960842,'Motte');
INSERT INTO Parent VALUES(9,'Raghu',9001237640,8756431912,'Aradhana');
INSERT INTO Parent VALUES(10,'Maruthi',8756412398,9001245003,'Shanti Nagara');


INSERT INTO LG VALUES(1,'Vasudeva Rao',9875643120,9875643210,'Yelahanka');
INSERT INTO LG VALUES(2,'Anand',8875643822,7875643711,'RR nagar');
INSERT INTO LG VALUES(3,'Vishwanath',7775643100,6875633890,'Girinagar');
INSERT INTO LG VALUES(4,'Arjun',8866956673,7768945688,'Malleswaram');
INSERT INTO LG VALUES(5,'Amit',7894639986,9976868868,'Whitefield');
INSERT INTO LG VALUES(6,'Praveen',8578953074,9682054722,'Jaya nagar');
INSERT INTO LG VALUES(7,'Gopinath',8995643828,6361568970,'Yashwantpura');
INSERT INTO LG VALUES(8,'Swaroopa Rani',9875643129,6367564324,'Peenya');
INSERT INTO LG VALUES(9,'Jagannath',997564456,7893563210,'Hulimavu');
INSERT INTO LG VALUES(10,'Giridhar',7785678120,8567438710,'Hosahalli');


INSERT INTO Leave_application VALUES(1,1,'2019-08-21','2019-08-28','LG');
INSERT INTO Leave_application VALUES(2,2,'2019-05-12','2019-05-17','PARENT');
INSERT INTO Leave_application VALUES(3,1,'2019-06-02','2019-06-06','OTHER');
INSERT INTO Leave_application VALUES(4,2,'2019-08-10','2019-08-18','OTHER');
INSERT INTO Leave_application VALUES(5,1,'2019-06-01','2019-06-08','LG');
INSERT INTO Leave_application VALUES(6,2,'2019-06-21','2019-06-24','LG');
INSERT INTO Leave_application VALUES(7,2,'2019-09-04','2019-09-10','PARENT');
INSERT INTO Leave_application VALUES(8,2,'2019-10-01','2019-10-06','OTHER');
INSERT INTO Leave_application VALUES(9,2,'2019-08-09','2019-08-15','PARENT');
INSERT INTO Leave_application VALUES(10,1,'2019-08-12','2019-08-18','LG');

INSERT INTO Complaints VALUES(1,1,'About Food','I found stones in the food so please consider the issue.');
INSERT INTO Complaints VALUES(2,1,'About Water','We are not getting water in bathroom');
INSERT INTO Complaints VALUES(3,1,'About tubelight','Tubelight in our room is not working,please fix the issue.');
INSERT INTO Complaints VALUES(4,2,'About laundry ','I found my cloth missing.');
INSERT INTO Complaints VALUES(5,1,'About Room','Room is not clean ,so please consider the issue.');
INSERT INTO Complaints VALUES(6,2,'About Mess','Plates are not clean,please consider the issue.');
INSERT INTO Complaints VALUES(7,1,'About laundry','My shirt has burnt,please fix the issue.');
INSERT INTO Complaints VALUES(8,2,'About drinking water','Drinking water has pollutants');
INSERT INTO Complaints VALUES(9,1,'About laundry ','I found my cloth missing.');
INSERT INTO Complaints VALUES(10,2,'About Water','We are not getting water in bathroom');
