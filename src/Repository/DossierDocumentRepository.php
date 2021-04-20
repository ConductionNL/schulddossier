<?php

namespace GemeenteAmsterdam\FixxxSchuldhulp\Repository;

use Doctrine\ORM\EntityRepository;
use GemeenteAmsterdam\FixxxSchuldhulp\Entity\Dossier;
use GemeenteAmsterdam\FixxxSchuldhulp\Entity\DossierDocument;

class DossierDocumentRepository extends EntityRepository
{
    /**
     * @param Dossier $dossier
     * @return DossierDocument[]
     */
    public function fetchSchuldDossierDocumentsForDossier(Dossier $dossier) {
        $dql =  '
            SELECT dd, d FROM GemeenteAmsterdam\FixxxSchuldhulp\Entity\DossierDocument dd
            JOIN dd.document d
            WHERE dd.onderwerp = :onderwerp
            AND d.inPrullenbak = false';

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('onderwerp', DossierDocument::TYPE_SCHULDENOVERZICHT);

        return $query->getResult();
    }

    /**
     * @param Dossier $dossier
     * @return DossierDocument[]
     */
    public function fetchAanvraagDossierDocumentsForDossier(Dossier $dossier) {
        $dql =  '
            SELECT dd, d FROM GemeenteAmsterdam\FixxxSchuldhulp\Entity\DossierDocument dd
            JOIN dd.document d
            WHERE dd.onderwerp != :onderwerp
            AND d.inPrullenbak = false';

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('onderwerp', DossierDocument::TYPE_SCHULDENOVERZICHT);

        return $query->getResult();
    }
}
