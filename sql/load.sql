load data local infile 'C:/HL/Study/master2019/461DataBase/milestone3/code/CSC461Project1/dataset/User.csv'
into table USER
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
User_name,
Pwd,
Gender,
Authority
);

load data local infile 'C:/HL/Study/master2019/461DataBase/milestone3/code/CSC461Project1/dataset/Video.csv'
into table VIDEO
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\r\n'(
Uploader_id,
Video_name,
Video_url,
Upload_date,
Intro
);

load data local infile 'C:/HL/Study/master2019/461DataBase/milestone3/code/CSC461Project1/dataset/Following.csv'
into table FOLLOWING
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
User_id,
Following_id
);

load data local infile 'C:/HL/Study/master2019/461DataBase/milestone3/code/CSC461Project1/dataset/Tags.csv'
into table TAG
(Tag_name)
set T_id=NULL;

load data local infile 'C:/HL/Study/master2019/461DataBase/milestone3/code/CSC461Project1/dataset/Comment.csv'
into table COMMENT
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
Video_id,
User_id,
Content,
Release_date
);

load data local infile 'C:/HL/Study/master2019/461DataBase/milestone3/code/CSC461Project1/dataset/Rating.csv'
into table RATING
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
User_id,
Video_id,
Rate
);

load data local infile 'C:/HL/Study/master2019/461DataBase/milestone3/code/CSC461Project1/dataset/video_tag.csv'
into table VIDEO_TAG
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
Video_id,
Tag_id
);


