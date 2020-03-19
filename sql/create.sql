CREATE TABLE USER (
    Uid int PRIMARY KEY AUTO_INCREMENT,
    User_name varchar(255) NOT NULL,
    Pwd varchar(255) NOT NULL,
    Gender varchar(18),
    Authority varchar(255) NOT NULL
);

CREATE TABLE VIDEO (
    Vid int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    Uploader_id int NOT NULL,
    Video_name varchar(255) NOT NULL,
    Video_url varchar(255) NOT NULL,
    Upload_date TIMESTAMP NOT NULL,
    Intro varchar(255),
    FOREIGN KEY (Uploader_id) REFERENCES USER (Uid) ON DELETE CASCADE
);

CREATE TABLE FOLLOWING (
    User_id int NOT NULL,
    Following_id int NOT NULL,
    PRIMARY KEY (User_id, Following_id),
    FOREIGN KEY (User_id) REFERENCES USER (Uid) ON DELETE CASCADE,
    FOREIGN KEY (Following_id) REFERENCES USER (Uid) ON DELETE CASCADE
);

CREATE TABLE TAG (
    T_id int NOT NULL AUTO_INCREMENT,
    Tag_name varchar(255) NOT NULL UNIQUE,
    PRIMARY KEY (T_id)
);

CREATE TABLE COMMENT (
    Comment_id int NOT NULL AUTO_INCREMENT,
    Video_id int NOT NULL,
    User_id int NOT NULL,
    Content TEXT NOT NULL,
    Release_date TIMESTAMP NOT NULL,
    PRIMARY KEY (Comment_id),
    FOREIGN KEY (Video_id) REFERENCES VIDEO (Vid) ON DELETE CASCADE,
    FOREIGN KEY (User_id) REFERENCES USER (Uid) ON DELETE CASCADE
);

CREATE TABLE RATING (
    User_id int NOT NULL,
    Video_id int NOT NULL,
    Rate float NOT NULL,
    PRIMARY KEY (User_id, Video_id),
    FOREIGN KEY (User_id) REFERENCES USER (Uid) ON DELETE CASCADE,
    FOREIGN KEY (Video_id) REFERENCES VIDEO (Vid) ON DELETE CASCADE
);

CREATE TABLE VIDEO_TAG (
    Video_id int NOT NULL,
    Tag_id int NOT NULL,
    PRIMARY KEY (Video_id, Tag_id),
    FOREIGN KEY (Video_id) REFERENCES VIDEO (Vid) ON DELETE CASCADE,
    FOREIGN KEY (Tag_id) REFERENCES TAG (T_id) ON DELETE CASCADE
);