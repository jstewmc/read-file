<?php
/**
 * The file for the read-file service
 *
 * @author     Jack Clayton <clayjs0@gmail.com>
 * @copyright  2016 Jack Clayton
 * @license    MIT
 */

namespace Jstewmc\ReadFile;

use InvalidArgumentException;

/**
 * The read-file service
 *
 * @since  0.1.0
 */
class Read
{
    /* !Magic methods */

    /**
     * Returns the file's contents
     *
     * @param   string  $filename  the file's name
     * @return  string
     * @throws  InvalidArgumentException  if $filename is not a file
     * @throws  InvalidArgumentException  if $filename does not exist
     * @throws  InvalidArgumentException  if $filename is not readable
     * @since   0.1.0
     */
    public function __invoke(string $filename): string
    {
        if ( ! file_exists($filename)) {
            throw new InvalidArgumentException(
                __METHOD__ . "() expects parameter one, filename, to exist"
            );
        }
        
        if ( ! is_file($filename)) {
            throw new InvalidArgumentException(
                __METHOD__ . "() expects parameter one, filename, to be a file"
            );    
        }
        
        if ( ! is_readable($filename)) {
            throw new InvalidArgumentException(
                __METHOD__ . "() expects parameter one, filename, to be readable"
            );
        }
        
        return file_get_contents($filename);
    }    
}
