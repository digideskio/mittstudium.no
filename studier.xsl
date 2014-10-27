<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                xmlns:fo="http://www.w3.org/1999/XSL/Format"
                xmlns:aiiso="http://vocab.org/aiiso/schema#"
                xmlns:rating="http://purl.org/stuff/rev#"
                version="1.0">

    <xsl:template match="rdf:RDF">
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
                        <th>Karakter</th>
                    </tr>
                </thead>
                <tbody>
                    <xsl:apply-templates select="aiiso:Programme"/>
                </tbody>
            </table>
        </body>
        </html>
    </xsl:template>

    <xsl:template match="aiiso:Programme">
        <tr>
            <td>
                <xsl:value-of select="aiiso:name"/>
            </td>
            <td><xsl:value-of select="aiiso:code"/></td>
            <td><xsl:value-of select="rating:rating"/></td>
        </tr>
    </xsl:template>

</xsl:stylesheet>
