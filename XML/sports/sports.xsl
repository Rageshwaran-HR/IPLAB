<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output method="html" indent="yes"/>

    <xsl:template match="/sports">
        <html>
            <head>
                <title>Sports Information</title>
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    th, td {
                        border: 1px solid #000;
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #f2f2f2;
                    }
                </style>
            </head>
            <body>
                <h1>Sports Information</h1>
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Description</th>
                        <th>Players</th>
                    </tr>
                    <xsl:for-each select="sport">
                        <tr>
                            <td><xsl:value-of select="@name"/></td>
                            <td><xsl:value-of select="@type"/></td>
                            <td><xsl:value-of select="description"/></td>
                            <td><xsl:value-of select="players"/></td>
                        </tr>
                    </xsl:for-each>
                </table>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
