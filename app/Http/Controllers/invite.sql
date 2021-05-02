USE [godisciple2]
GO
/****** Object:  StoredProcedure [Person].[s_person_invite]    Script Date: 29-04-2021 00:05:42 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO



ALTER procedure [Person].[s_person_invite]
	(@formmethod varchar(100),@personid varchar(100), @firstname varchar(100), @lastname varchar(100),
		@nickname varchar(100), @email varchar(200),
		@mobilephone varchar(100), @churchrole varchar(100), @disciplerid varchar(100),
		@iserr varchar(1) output, @errmsg varchar(100) output)
as
begin
	if @formmethod  = 'Newdata'
	begin
		if not exists(select * from person.person where MobilePhone = @mobilephone)
		begin
			insert into person.person
				(personid, FirstName,LastName, NickName,  email, MobilePhone, ChurchRole,invitedate,disciplerid,PhotoPath,createid, createdate,Encrypted)
			select person.f_get_personid(@firstname, @mobilephone), @firstname, @lastname, @nickname, @email, @mobilephone, @churchrole, getdate(),
				@disciplerid,'default.jpeg',@disciplerid, getdate(), newid()

			set @iserr = 'N'
			select @iserr as iserr
		end
		else
		begin
			set @iserr = 'Y'
			set @errmsg = 'Mobilephone already exists on the system'
			select @iserr as iserr, @errmsg as errmsg
		end
	end
	else
	begin
		if exists(select * from person.person where personid = @personid)
		begin
			update person.person
				set FirstName = @firstname, LastName = @lastname,
					NickName = @nickname, email = @email,
					MobilePhone = @mobilephone, ChurchRole = @churchrole,
					DisciplerID = @disciplerid, updateid = @disciplerid, updatedate = getdate()
            set @iserr = 'N'
			select @iserr as iserr
		end
		else
		begin
			set @iserr = 'Y'
			set @errmsg = 'Personid not exists on the system'
			select @iserr as iserr, @errmsg as errmsg
		end
	end
end


