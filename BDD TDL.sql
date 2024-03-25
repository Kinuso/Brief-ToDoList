#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Priority
#------------------------------------------------------------

CREATE TABLE TDL_PRIORITY(
        ID_PRIORITY Varchar (80) NOT NULL ,
        NAME        Int NOT NULL
	,CONSTRAINT TDL_PRIORITY_PK PRIMARY KEY (ID_PRIORITY)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Category
#------------------------------------------------------------

CREATE TABLE TDL_CATEGORY(
        ID_CATEGORY Int  Auto_increment  NOT NULL ,
        NAME        Int NOT NULL
	,CONSTRAINT TDL_CATEGORY_PK PRIMARY KEY (ID_CATEGORY)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE TDL_USER(
        ID_USER   Int  Auto_increment  NOT NULL ,
        FIRSTNAME Varchar (50) NOT NULL ,
        LASTNAME  Varchar (50) NOT NULL ,
        PASSWORD  Varchar (255) NOT NULL ,
        EMAIL     Varchar (80) NOT NULL
	,CONSTRAINT TDL_USER_AK UNIQUE (EMAIL)
	,CONSTRAINT TDL_USER_PK PRIMARY KEY (ID_USER)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Task
#------------------------------------------------------------

CREATE TABLE TDL_TASK(
        ID_TASK     Int  Auto_increment  NOT NULL ,
        NAME        Varchar (50) NOT NULL ,
        DESCRIPTION Varchar (255) NOT NULL ,
        DUE_DATE    Date NOT NULL ,
        ID_PRIORITY Varchar (80) NOT NULL ,
        ID_USER     Int NOT NULL
	,CONSTRAINT TDL_TASK_PK PRIMARY KEY (ID_TASK)

	,CONSTRAINT TDL_TASK_TDL_PRIORITY_FK FOREIGN KEY (ID_PRIORITY) REFERENCES TDL_PRIORITY(ID_PRIORITY)
	,CONSTRAINT TDL_TASK_TDL_USER0_FK FOREIGN KEY (ID_USER) REFERENCES TDL_USER(ID_USER)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Link
#------------------------------------------------------------

CREATE TABLE TDL_LINK(
        ID_CATEGORY Int NOT NULL ,
        ID_TASK     Int NOT NULL
	,CONSTRAINT LINK_PK PRIMARY KEY (ID_CATEGORY,ID_TASK)

	,CONSTRAINT LINK_TDL_CATEGORY_FK FOREIGN KEY (ID_CATEGORY) REFERENCES TDL_CATEGORY(ID_CATEGORY)
	,CONSTRAINT LINK_TDL_TASK0_FK FOREIGN KEY (ID_TASK) REFERENCES TDL_TASK(ID_TASK)
)ENGINE=InnoDB;

