

CREATE DATABASE convention;


USE convention;
CREATE TABLE participants(
    id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    lname VARCHAR(191) NOT NULL,
    fname VARCHAR(191) NOT NULL,
    phone INTEGER(11) NOT NULL,
    email VARCHAR(191) NOT NULL
);

CREATE TABLE speakers(
    id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    participant_id INTEGER UNSIGNED NOT NULL,
    expertise VARCHAR(191) NOT NULL,
    FOREIGN KEY (participant_id) REFERENCES participants(id)
);

CREATE TABLE `sessions`(
    id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(191) NOT NULL,
    venue VARCHAR(191) NOT NULL,
    speaker_id INTEGER UNSIGNED NOT NULL,
    FOREIGN KEY (speaker_id) REFERENCES speakers(id)
);

CREATE TABLE participations(
    id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    participant_id INTEGER UNSIGNED NOT NULL,
    session_id INTEGER UNSIGNED NOT NULL,
    FOREIGN KEY (participant_id) REFERENCES participants(id),
    FOREIGN KEY (session_id) REFERENCES sessions(id)
);

INSERT INTO participants(lname, fname, phone, email)
    VALUES
        ("Morrison", "Jim", 09393867222, "morrison_jim@gmail.com"),
        ("Presley", "Amanda", 09472693619, "amndapresley@gmail.com"),
        ("Reinhart", "Seraphina", 09472666936, "reinhartangel@gmail.com"),
        ("Lockwood", "Flinn", 09611936197,"flinnlockwood@gmail.com"),
        ("Grey", "Christian", 0910231310, "christiangrey@gmail.com"),
        ("Calderon", "Elliot", 09271475381, "calderon_elliot@gmail.com"),
        ("Sanders", "Angelica", 09486229361, "angelsanders@gmail.com");
        ("Juric", "Valintine", 09482666110, "juricvalintine@gmail.com"),     
        
INSERT INTO speakers(participant_id, expertise)
    VALUES("8", "Political Talks, Medicine"),
        ("5", "Bussiness, Inventing");

INSERT INTO `sessions`(title, venue, speaker_id)
    VALUES("International conference on Vaccine and Vaccine research (vaccination)", "SMX Convention Center
Mall of Asia Complex, Seaside Blvd., Pasay", "1"),
        ("International Conference on Safety, Health and Welfare (RAGUSA SHWA)", "World Trade Center Metro Manila", "2");

INSERT INTO participations(participant_id, session_id)
    VALUES  ("1","2"),
            ("2","1"),
            ("3","2"),
            ("4","1"),
            ("5","2"),
            ("6","2"),
            ("7","1"),
            ("8","1");