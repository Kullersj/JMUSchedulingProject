<%@ Language="VBscript" %>
<html>
    <head>
        <title>Submitted data</title>
    </head>

    <body>
        <% 
        Dim fname, lname, email, phone, jac, bothlocation, location, back2back,
           
        fname = Request.Form("fname")
        lname = Request.Form("lname")
        email = Request.Form("email")
        phone   
        comment = Request.Form("comment")

        Response.Write("Name: " & name & "<br>")
        Response.Write("E-mail: " & email & "<br>")
        Response.Write("Comments: " & comment & "<br>")
        %> 
    </body>
</html>