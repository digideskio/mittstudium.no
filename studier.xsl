<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:fo="http://www.w3.org/1999/XSL/Format"
                version="1.0">

    <xsl:template match="mittstudium">
        <html>
            <head>
                <style type="text/css">
                    body { font-family: ubuntu, sans-serif; }
                    table { border-collapse: collapse; width: 100%; max-width: 900px; margin: 20px auto; }
                    th { background-color: yellow }
                    th, td { padding: 10px; text-align: left; }
                    td { border-bottom: 1px solid #ccc }
                </style>
            </head>
        <body>
            <table>
                <thead>
                    <tr>
                        <th>Tittel</th>
                        <th color="green">Fagkode</th>
                        <th>Studiepoeng</th>
                    </tr>
                </thead>
                <tbody>
                    <xsl:apply-templates select="course"/>
                </tbody>
            </table>
        </body>
        </html>
    </xsl:template>

    <xsl:template match="course">
        <tr>
            <td>
                <xsl:element name="a">
                    <xsl:attribute name="href">
                        <xsl:value-of select="url"/>
                    </xsl:attribute>
                    <xsl:value-of select="title"/>
                </xsl:element>
            </td>
            <td><xsl:value-of select="code"/></td>
            <td><xsl:value-of select="credits"/></td>
        </tr>
    </xsl:template>

</xsl:stylesheet>
