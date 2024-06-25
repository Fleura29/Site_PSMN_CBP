import xml.etree.ElementTree as ET #module pour analyser et manipuler les fichiers XML en python

def limit_rss_items(file_path, max_items=5):
    tree = ET.parse(file_path)
    root = tree.getroot()

    channel = root.find('channel') #cherche l'élément <channel> dans le document XML
    items = channel.findall('item')

    for item in items[max_items:]: #sélectionne tous les items après le max_items-ème item
        channel.remove(item)

    tree.write(file_path, encoding='utf-8', xml_declaration=True)

rss_file_path = 'build/html/_static/news.rss'

limit_rss_items(rss_file_path, max_items=5)
