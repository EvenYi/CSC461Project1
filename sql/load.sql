load data local infile '/home/hgao11/public_html/sql/dataset/User.csv'
into table USER
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
User_name,
Pwd,
Gender,
Authority
);

load data local infile '/home/hgao11/public_html/sql/dataset/Video.csv'
into table VIDEO
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
Uploader_id,
Video_name,
Video_url,
Upload_date,
Intro
);

load data local infile '/home/hgao11/public_html/sql/dataset/Following.csv'
into table FOLLOWING
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
User_id,
Following_id
);

load data local infile '/home/hgao11/public_html/sql/dataset/Tags.csv'
into table TAG
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
T_id,
Tag_name
);

load data local infile '/home/hgao11/public_html/sql/dataset/Comment.csv'
into table COMMENT
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
Video_id,
User_id,
Content,
Release_date
);

load data local infile '/home/hgao11/public_html/sql/dataset/Rating.csv'
into table RATING
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
User_id,
Video_id,
Rate
);

load data local infile '/home/hgao11/public_html/sql/dataset/VIDEO_TAG.csv'
into table VIDEO_TAG
fields terminated by ','
optionally enclosed by '"'
lines terminated by '\n'(
Video_id,
Tag_id
);

